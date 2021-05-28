<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class CalculatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('loan', NumberType::class, [
                'label' => 'Montant de l’emprunt (hors apport)',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => '150 000'
                ]
            ])
            ->add('term', IntegerType::class, [
                'label' => 'Durée de l\'emprunt (ans)',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => '20'
                ]
            ])
            ->add('rate', NumberType::class, [
                'label' => 'Taux d\'intérêt de l\'emprunt',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => '1.75'
                ]
            ]);
        $builder
            ->setMethod('POST');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}
