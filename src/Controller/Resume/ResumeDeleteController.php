<?php

namespace App\Controller\Resume;

use App\Entity\Resume;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ResumeDeleteController extends AbstractController
{
    public function __invoke(Resume $resume, Request $request, EntityManagerInterface $em): Response
    {
        $em->remove($resume);
        $em->flush();

        return $this->redirectToRoute('resume');
    }
}
