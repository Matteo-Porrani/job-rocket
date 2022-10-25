<?php

namespace App\Controller\Platform;

use App\Repository\PlatformRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlatformController extends AbstractController
{
    public function __invoke(PlatformRepository $platformRepository)
    {
        $platforms = $platformRepository->findAll();

        return $this->render('platform/platform_list.html.twig', [
            'platforms' => $platforms,
        ]);
    }
}
