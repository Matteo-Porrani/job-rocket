<?php

namespace App\Controller\Dashboard;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
{
    public function __invoke()
    {
        return $this->render('dashboard/dashboard.html.twig');
    }
}