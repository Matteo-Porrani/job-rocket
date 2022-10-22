<?php

namespace App\Controller\Company;

use App\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Form\Company\CompanyType;

class CompanyDeleteController extends AbstractController
{
    public function __invoke(Company $company, Request $request, EntityManagerInterface $em): Response
    {
        $em->remove($company);
        $em->flush();

        return $this->redirectToRoute('company');
    }
}