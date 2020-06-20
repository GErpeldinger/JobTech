<?php

namespace App\Form;

use App\Entity\Candidate;
use App\Entity\Gender;
use PHPStan\Type\Traits\FalseyBooleanTypeTrait;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', EntityType::class, [
                'label' => false,
                'class' => Gender::class,
                'attr' => ['class' => 'gender'],
                'choice_label' => 'acronym',
                'expanded' => true
            ])
            ->add('surname', TextType::class, [
                'label' => 'Nom :'])
            ->add('firstName', TextType::class, [
                'label' => 'Prénom :'
            ])
            ->add('birthday', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => ['class' => 'js-datepicker']
            ])
            ->add('phoneNumber', IntegerType::class, [
                'label' => 'Numéro portable :'
            ])
            ->add('otherNumber', IntegerType::class, [
                'label' => 'Autre numéro :',
                'required' => false,
            ])
            ->add('postalCode', IntegerType::class, [
                'label' => 'Code postale :'
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville :'
            ])
            ->add('country', TextType::class, [
                'label' => 'Pays :'
            ])
            ->add('isHandicapped', CheckboxType::class, [
                'label' => 'Je souhaite faire part d\'une situation d\'handicap.',
                'required' => false,
            ])
            ->add('isContactableTel', CheckboxType::class, [
                'label' => 'par téléphone.',
                'required' => false,
            ])
            ->add('isContactableEmail', CheckboxType::class, [
                'label' => 'par Email.',
                'required' => false,
                'attr' => ['checked' => true]
            ]);
        /**
         * $builder
         *  ->add('haveVehicle')
         *  ->add('curriculumVitae')
         *  ->add('license')
         *  ->add('mobility')
         *  ->add('skill')
         *  ->add('currentSituation');
         */
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
            'action' => '',
        ]);
    }
}
