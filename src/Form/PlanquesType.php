<?php

namespace App\Form;

use App\Entity\Typemission;
use App\Entity\Typeplanque;
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
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PlanquesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeidentification', TextType::class)
            ->add('adresse', TextType::class)
            ->add('type', EntityType::class, [
                'choice_label' => 'nom', 
                'class' => typeplanque::class,
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('pays', EntityType::class, [
                'choice_label' => 'nom', 
                'class' => Pays::class,
                'multiple' => false,
                'expanded' => false,
            ]);
            
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Planques::class,
        ]);
    }
}

