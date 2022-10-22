<?php

namespace App\Controller\Company;

use App\Entity\Company;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Form\Company\CompanyType;

class CompanyFormController extends AbstractController
{
    public function __invoke(Company $company = null, Request $request, EntityManagerInterface $em): Response
    {

        if (null === $company) {
            $company = new Company();
        }

        $form = $this->createForm(CompanyType::class, $company);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $company = $form->getData();

            $em->persist($company);
            $em->flush();

            return $this->redirectToRoute('company');

        }

        return $this->render('company/company_form.html.twig', [
            'form' => $form->createView(),
            'company' => $company,
        ]);
    }

}