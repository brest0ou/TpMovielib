<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null,[
                'label' => 'Nom du film'
            ])
            ->add('poster', null,[
                'label' => 'Image'])
            ->add('date_release', null,[
                'label' => 'Date de sortie'])
            ->add('duration', null,[
                'label' => 'Durée'])
            ->add('type', null,[
                'label' => 'Catégorie'])
            ->add('actors', null,[
                'label' => 'Acteur'])
            ->add('producers', null,[
                'label' => 'Producteur',
                'expanded' => true,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
            'attr' => [
                'novalidate' => 'novalidate', //on dit a google laisse moi envoyer mes donnée même si j'ai pas tout saisie ( c'est bien pour tester )
            ]
        ]);
    }
}
