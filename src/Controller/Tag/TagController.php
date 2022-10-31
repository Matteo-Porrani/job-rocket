<?php

namespace App\Controller\Tag;

use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class TagController extends AbstractController
{

    public function __invoke(TagRepository $tagRepository): Response
    {

        $tags = $tagRepository->findAll();

        return $this->render('tag/tag.html.twig', [
            'tags' => $tags,
        ]);
    }

}

/**
 * ### Tag
 *
 * id
 *
 * name
 *
 * colorLight
 *
 * colorMid
 *
 * colorDark
 *
 *
 */