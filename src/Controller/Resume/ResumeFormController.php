<?php

namespace App\Controller\Resume;

use App\Entity\Resume;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Form\Resume\ResumeType;

class ResumeFormController extends AbstractController
{
    public function __invoke(Resume $resume = null, Request $request, EntityManagerInterface $em): Response
    {

        if (null === $resume) {
            $resume = new Resume();
        }

        $form = $this->createForm(ResumeType::class, $resume);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $resume = $form->getData();

            $resume->setLength(mb_strlen($resume->getContent()));

            $em->persist($resume);
            $em->flush();

            return $this->redirectToRoute('resume');

        }

        return $this->render('resume/resume_form.html.twig', [
            'form' => $form->createView(),
            'resume' => $resume,
        ]);
    }

}
