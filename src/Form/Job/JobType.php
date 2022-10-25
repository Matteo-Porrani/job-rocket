<?php

namespace App\Form\Job;

use App\Entity\Company;
use App\Entity\Job;
use App\Entity\Platform;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Intitulé',
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Status',
                'choices' => [
                    // 'UI value' => 'real data value'
                    'Refusé' => '0',
                    'À traiter' => '1',
                    'Candidature' => '2',
                    'En cours' => '3',
                    'Entretien' => '4',
                ]
            ])
            ->add('link')
            ->add('appliedOn', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('company', EntityType::class, [
                'choice_label' => 'name',
                'class' => Company::class
            ])
            ->add('platform', EntityType::class, [
                'choice_label' => 'name',
                'class' => Platform::class
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
        ]);
    }
}
