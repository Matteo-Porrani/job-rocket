<?php

namespace App\Controller\Job;

use App\Entity\Job;
use App\Form\Job\JobType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\String\Slugger\SluggerInterface;

class JobFormController extends AbstractController
{
    private const DEFAULT_FILENAME = '3dfolder-63601bb71a95b-webp';

    public function __invoke(
        Job $job = null,
        Request $request,
        EntityManagerInterface $em,
        SluggerInterface $slugger
    ): Response
    {

        if (!$job) {
            $job = new Job();

            $job->setImgFilename(self::DEFAULT_FILENAME);
        }







        if ($job->getImgFilename() === null) {
            $job->setImgFilename(self::DEFAULT_FILENAME);
        }









        $form = $this->createForm(JobType::class, $job);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $job = $form->getData();

            // file upload handling
            $imgFile = $form->get('imgFile')->getData();

            if ($imgFile) {

                $originalFilename = pathinfo($imgFile->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);

                $newFilename = $safeFilename.'-'.uniqid().'-'.$imgFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {

                    $imgFile->move($this->getParameter('link_images_directory'), $newFilename);

                } catch (FileException $e) {

                }

                $job->setImgFilename($newFilename);

            }

            // ...persist

            $em->persist($job);
            $em->flush();

            return $this->redirectToRoute('index');

        }

        return $this->render('job/job_form.html.twig', [
           'form' => $form->createView(),
            'job' => $job,
        ]);

    }
}