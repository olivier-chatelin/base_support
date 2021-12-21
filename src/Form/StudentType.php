<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Curriculum;
use App\Entity\Instructor;
use App\Entity\Student;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname',TextType::class)
            ->add('lastname',TextType::class)
            ->add('campus',EntityType::class,[
                'class' => Campus::class,
                'choice_label'=>'city'
            ])
            ->add('curriculum', EntityType::class,[
                'class' => Curriculum::class,
                'choice_label' => 'name'
            ])
            ->add('instructor', EntityType::class,[
                'class' => Instructor::class,
                'choice_label' => 'fullName'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
