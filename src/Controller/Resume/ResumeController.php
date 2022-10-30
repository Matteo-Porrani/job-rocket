<?php

namespace App\Controller\Resume;

use App\Repository\ResumeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ResumeController extends AbstractController
{
    public function __invoke(ResumeRepository $resumeRepository)
    {
        $resumes = $resumeRepository->findAll();

        return $this->render('resume/resume.html.twig', [
            'resumes' => $resumes,
        ]);
    }

}