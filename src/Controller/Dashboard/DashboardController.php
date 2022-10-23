<?php

namespace App\Controller\Dashboard;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\JobRepository;

class DashboardController extends AbstractController
{
    public function __invoke(JobRepository $jobRepository)
    {

        $jobs = $jobRepository->findAll();

        return $this->render('dashboard/dashboard.html.twig', compact('jobs'));
    }
}