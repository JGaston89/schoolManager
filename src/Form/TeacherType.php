<?php

namespace App\Form;

use App\Entity\Teacher;
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
            ->add('asignature')
            // ->add('asignature', EntityType::class, [
            //     'class' => 'App\Entity\Asignature',
            //     'choice_label' => 'name', // Campo a mostrar en el selector (nombre de la materia)
            //     'multiple' => true, // Permitir selección múltiple
            //     'expanded' => true, // Mostrar las opciones como checkboxes
            //     'by_reference' => false, // Es importante colocar esto como false para que se asigne correctamente al profesor
            // ])
            ->add('save', SubmitType::class, ['label' => 'Crear Profesor']);
    ;}

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
        ]);
    }
}