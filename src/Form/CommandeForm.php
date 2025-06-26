<?php

namespace App\Form;

use App\Entity\Commande;
use App\Entity\Lunette;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('valide')
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
            ->add('lunettes', EntityType::class, [
                'class' => Lunette::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
