<?php

namespace App\Controller\Link;

use App\Entity\Link;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Form\Link\LinkType;

use Symfony\Component\String\Slugger\SluggerInterface;

class LinkFormController extends AbstractController
{

//    private const DEFAULT_FILENAME = 'default-rocket.png';
    private const DEFAULT_FILENAME = '3dfolder-63601bb71a95b-webp';

    public function __invoke(
        Link                   $link = null,
        Request                $request,
        EntityManagerInterface $em,
        SluggerInterface       $slugger
    ): Response
    {

        if (null === $link) {
            $link = new Link();

            $link->setImgFilename(self::DEFAULT_FILENAME);
        }

        $form = $this->createForm(LinkType::class, $link);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $link = $form->getData();

            // file upload handling
            $imgFile = $form->get('img')->getData();

            if ($imgFile) {
                $originalFilename = pathinfo($imgFile->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);

                $newFilename = $safeFilename.'-'.uniqid().'-'.$imgFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {

                    $imgFile->move($this->getParameter('link_images_directory'), $newFilename);

                } catch (FileException $e) {

                }

                $link->setImgFilename($newFilename);

            }


            // ...persist

            $em->persist($link);
            $em->flush();

            return $this->redirectToRoute('link');

        }

        return $this->render('link/link_form.html.twig', [
            'form' => $form->createView(),
            'link' => $link,
        ]);
    }

}
