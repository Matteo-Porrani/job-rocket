<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('status', [$this, 'getComputedStatus']),
            new TwigFilter('status_color', [$this, 'getStatusColor']),
            new TwigFilter('resume_type', [$this, 'getResumeType']),
            new TwigFilter('price', [$this, 'formatPrice']),
        ];
    }

    public function formatPrice(float $number, int $decimals = 0, string $decPoint = '.', string $thousandsSep = ','): string
    {
        $price = number_format($number, $decimals, $decPoint, $thousandsSep);
        $price = '$'.$price;

        return $price;
    }

    public function getComputedStatus(string $statusCode): string
    {
        switch ($statusCode) {
            case 0:
                $computedStatus = 'Refusé';
                break;
            case 1:
                $computedStatus = 'À traiter';
                break;
            case 2:
                $computedStatus = 'Candidature';
                break;
            case 3:
                $computedStatus = 'En cours';
                break;
            case 4:
                $computedStatus = 'Entretien';
                break;
        }

        return $computedStatus;
    }

    public function getStatusColor(string $statusCode): string
    {
        switch ($statusCode) {
            case 0:
                $statusColor = 'danger';
                break;
            case 1:
                $statusColor = 'grey-light';
                break;
            case 2:
                $statusColor = 'warning';
                break;
            case 3:
                $statusColor = 'orange';
                break;
            case 4:
                $statusColor = 'teal';
                break;
        }

        return $statusColor;
    }

    public function getResumeType(string $typeCode): string
    {
        switch ($typeCode) {
            case 'FRO':
                $resumeType = 'Frontend';
                break;
            case 'BCK':
                $resumeType = 'Backend';
                break;
            case 'FLL':
                $resumeType = 'Fullstack';
                break;
        }

        return $resumeType;

    }



}