<?php

namespace App\Controller\Platform;

use App\Entity\Platform;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Form\Platform\PlatformType;

class PlatformFormController extends AbstractController
{
    public function __invoke(Platform $platform = null, Request $request, EntityManagerInterface $em): Response
    {

        if (null === $platform) {
            $platform = new Platform();
        }

        $form = $this->createForm(PlatformType::class, $platform);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $platform = $form->getData();

            $em->persist($platform);
            $em->flush();

            return $this->redirectToRoute('platform');

        }

        return $this->render('platform/platform_form.html.twig', [
            'form' => $form->createView(),
            'platform' => $platform,
        ]);
    }

}
