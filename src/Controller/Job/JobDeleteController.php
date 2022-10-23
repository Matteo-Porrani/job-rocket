<?php

namespace App\Controller\Job;

use App\Entity\Job;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class JobDeleteController extends AbstractController
{
    public function __invoke(Job $job, Request $request, EntityManagerInterface $em): Response
    {
        $em->remove($job);
        $em->flush();

        return $this->redirectToRoute('index');
    }
}
