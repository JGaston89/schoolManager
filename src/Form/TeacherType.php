<?php

namespace App\Form;

use App\Entity\Teacher;
use App\Entity\Asignature;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
      ->add('name')
      ->add('lastName')
      ->add('dni')
      ->add('asignature', EntityType::class, [
          'class' => Asignature::class,
          'choice_label' => 'name',
          'multiple' => true,
          'expanded' => true,
      ])
      ->add('save', SubmitType::class, ['label' => 'Crear Profesor']);
    ;}

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
        ]);
    }
}