<?php

namespace App\Controller\Link;

use App\Entity\Link;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LinkDeleteController extends AbstractController
{
    public function __invoke(Link $link, Request $request, EntityManagerInterface $em): Response
    {
        $em->remove($link);
        $em->flush();

        return $this->redirectToRoute('link');
    }
}
