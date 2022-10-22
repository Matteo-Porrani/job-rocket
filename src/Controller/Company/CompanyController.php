<?php

namespace App\Controller\Company;

use App\Repository\CompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CompanyController extends AbstractController
{
    public function __invoke(CompanyRepository $companyRepository)
    {
        $companies = $companyRepository->findAll();

        return $this->render('company/company_list.html.twig', [
            'companies' => $companies,
        ]);
    }

}