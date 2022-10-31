<?php

namespace App\Controller\Link;

use App\Repository\LinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class LinkController extends AbstractController
{

    public function __invoke(LinkRepository $linkRepository): Response
    {

        $links = $linkRepository->findAll();

        return $this->render('link/link.html.twig', [
            'links' => $links,
        ]);
    }

}

/**
 * ### Link
 *
 * id
 *
 * title
 *
 * notes
 *
 * url
 *
 * imgFilename
 *
 * (tags) -> entity
 *
 */