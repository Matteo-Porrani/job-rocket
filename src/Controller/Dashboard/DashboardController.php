<?php

namespace App\Controller\Dashboard;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\JobRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends AbstractController
{
    public function __invoke(Request $request, JobRepository $jobRepository): Response
    {
        $progress = $request->query->get('progress');

        if (isset($progress) && $progress === 'active') {
            $jobs = $jobRepository->findActiveJobs();
        } else {
            $jobs = $jobRepository->findAll();
        }



        return $this->render('dashboard/dashboard.html.twig', compact('jobs'));
    }


    public function filterByStatus(string $status, JobRepository $jobRepository)
    {
        $jobs = $jobRepository->findByStatus($status);

        return $this->render('dashboard/dashboard.html.twig', compact('jobs'));
    }

}