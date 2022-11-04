<?php

namespace App\Form;

use App\Entity\PlannedActivity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Router;

class PlannedActivityType extends AbstractType
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $id = $options['attr']['id'] ?? null;

        $dates = [
             'Dimanche' => 6,
             'Lundi' => 0,
             'Mardi' => 1,
             'Mercredi' => 2,
             'Jeudi' => 3,
             'Vendredi' => 4,
             'Samedi' => 5,
        ];

        $builder
            ->add('dayOfWeek', ChoiceType::class, [
                'label' => 'Jour de la semaine',
                'choices' => $dates,
            ])
            ->add('date', DateType::class)
            ->add('time_start', TimeType::class)
            ->add('time_end', TimeType::class)
            ->add('Comment', TextareaType::class, [
                'required' => false,
            ])
            ->add('familyMembers')
            ->add('activity')
        ;

        if ($id) {
            $builder->setAction($this->router->generate('activity_plan', ['id' => $id]))
                ->setMethod('PATCH');
        } else {
            $builder->setAction($this->router->generate('activity_plan'))
                ->setMethod('POST');
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PlannedActivity::class,
            'attr' => [
                'class' => 'plannedActivityForm',
            ],
        ]);
    }
}
