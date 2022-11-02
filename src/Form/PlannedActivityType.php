<?php

namespace App\Form;

use App\Entity\PlannedActivity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlannedActivityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dayOfWeek')
            ->add('date')
            ->add('time_start')
            ->add('time_end')
            ->add('Comment')
            ->add('users')
            ->add('activity')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PlannedActivity::class,
        ]);
    }
}
