<?php

namespace App\Controller\Platform;

use App\Entity\Platform;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlatformDeleteController extends AbstractController
{
    public function __invoke(Platform $platform, Request $request, EntityManagerInterface $em): Response
    {
        $em->remove($platform);
        $em->flush();

        return $this->redirectToRoute('platform');
    }
}
