<?php

namespace App\Form;

use App\Entity\PlannedActivity;
use App\Form\EventListener\SetPlannedActivityDate;
use App\Form\Field\SwitchDateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
            ->add('switchDate', CheckBoxType::class, [
                'mapped' => false,
                'row_attr' => [
                    'class' => 'form-check form-switch'
                ],
                'label_attr' => [
                    'class' => 'form-check-label',
                ],
                'label' => 'Jour de la semaine',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input',
                    'checked' => 'checked',
                ],
            ])
            ->add('dayOfWeek', ChoiceType::class, [
                'label' => 'Jour de la semaine',
                'choices' => $dates,
                'row_attr' => [
                    'class' => 'day-of-week-row'
                ]
            ])
            ->add('date', DateType::class,[
                'row_attr' => [
                    'class' => 'date-row'
                ]
            ])
            ->add('time_start', TimeType::class)
            ->add('time_end', TimeType::class)
            ->add('Comment', TextareaType::class, [
                'required' => false,
            ])
            ->add('familyMembers')
            ->add('activity')
            ->addEventSubscriber(new SetPlannedActivityDate())
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
