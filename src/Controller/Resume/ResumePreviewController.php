<?php

namespace App\Controller\Resume;

use App\Entity\Resume;
//use App\Repository\ResumeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ResumePreviewController extends AbstractController
{
    public function __invoke(Resume $resume)
    {
//        $resumes = $resumeRepository->findAll();

        return $this->render('resume/resume_preview.html.twig', [
            'resume' => $resume,
        ]);
    }

}