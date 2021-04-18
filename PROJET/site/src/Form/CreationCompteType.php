<?php

namespace App\Form;

use App\Entity\Utilisateurs;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreationCompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('identifiant', TextType::class,
            ['label' => 'Identifiant :'])
            ->add('motdepasse', TextType::class,
            ['label' => 'Mot de passe :'])
            ->add('nom', TextType::class,
            ['label' => 'Nom :', 'required' => false])
            ->add('prenom', TextType::class,
                ['label' => 'Prenom :', 'required' => false])
            ->add('anniversaire', DateType::class,
                ['label' => 'Date de naissance :',
                    'widget'=>'single_text',
                    'input' => 'datetime',
                    'required' => false])
            ->add('isadmin', HiddenType::class, ['data' => 0])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateurs::class,
        ]);
    }
}
//Berthelot Yann