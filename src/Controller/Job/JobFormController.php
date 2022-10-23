<?php

namespace App\Controller\Job;

use App\Entity\Job;
use App\Form\Job\JobType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class JobFormController extends AbstractController
{

    public function __invoke(Job $job = null, Request $request, EntityManagerInterface $em): Response
    {

        if (!$job) {
            $job = new Job();
        }

        $form = $this->createForm(JobType::class, $job);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $job = $form->getData();

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