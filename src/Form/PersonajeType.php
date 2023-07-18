<?php

namespace App\Form;

use App\Entity\Pelicula;
use App\Entity\Personaje;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonajeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'label'=> 'Nombre',
                'attr' => ['placeholder'=>'Nombre del personaje']
            ])
            ->add('image', null, [
                'label'=> 'Imagen'
            ])
            ->add('role', null, [
                'label'=> 'Role',
                'attr' => ['placeholder'=>'Describe brevemente quién es este personaje']
            ])
            ->add('peliculas', EntityType::class, [
                'class'=> Pelicula::class,
                'choice_label'=> 'title',
                'multiple'=> true,
                'expanded'=> true
                ])
            ->add('Enviar', SubmitType::class)
            ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personaje::class,
        ]);
    }
}
