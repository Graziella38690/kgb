<?php

namespace App\Form;

use App\Entity\Typemission;
use App\Entity\Statumission;
use App\Entity\Missions;
use App\Entity\Agents;
use App\Entity\Nationalite;
use App\Entity\Planques;
use App\Entity\Pays;
use App\Entity\Cibles;
use App\Entity\Contacts;
use App\Entity\Specialite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MissionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class)
            ->add('description',TextareaType::class)
            ->add('codemission',TextType::class)
            ->add('datededebut')
            ->add('datedefin')
            ->add('statut', EntityType::class, [
                'choice_label' => 'nom', 
                'class' => Statumission::class,
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('specialite', EntityType::class, [
                'choice_label' => 'nom', 
                'class' => Specialite::class,
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('cibles', EntityType::class, [
                'choice_label' => 'nom', 
                'class' => Cibles::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('agents', EntityType::class, [
                'choice_label' => 'nom',
                'class' => Agents::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('pays', EntityType::class, [
                'choice_label' => 'nom', 
                'class' => Pays::class,
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('planque', EntityType::class, [
                'choice_label' => 'codeidentification', 
                'class' => Planques::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('Type', EntityType::class, [
                'choice_label' => 'nom', 
                'class' => Typemission::class,
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('contacts', EntityType::class, [
                'choice_label' => 'nom',  
                'class' => contacts::class,
                'multiple' => true,
                'expanded' => true,
            ]);
        }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Missions::class,
        ]);
    }
}
