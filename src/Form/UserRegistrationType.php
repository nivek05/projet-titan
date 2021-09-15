<?php

namespace App\Form;

use App\Entity\UsersRegistration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Regex;

class UserRegistrationType extends AbstractType
{
    //Definition of form fields
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //FirstName Fields
            ->add('firstname', TextType::class,[
                'required' => true,
                'label' =>'Prénom',
                //Constraint regex
                'constraints' => [
                    new Regex(
                        [
                        'pattern' => '/^[a-z]+$/i',
                        'htmlPattern' => '[a-zA-Z]+',
                        'message' => 'Prénom invalide'
                        ]
                    )    
                ]         
            ])
            //Name Fields
            ->add('name', TextType::class,[
                'required' => true,
                'label' => 'Nom',
                //Constraint regex
                'constraints' => [
                    new Regex(
                        [
                        'pattern' => '/^[a-z]+$/i',
                        'htmlPattern' => '[a-zA-Z]+',
                        'message' => 'Nom invalide'
                        ]
                    )    
                ]         
            ])
            //Email Fields
            ->add('email', EmailType::class,[
                'required' => true,
                'label' => 'Email',
                'constraints' => [
                    new assert\Email([
                        'message' => 'Email non valide'
                    ])
                ]
            ])
            //is_accepted checkbox
            ->add('is_accepted', CheckboxType::class,[
                'required' => true,
                'label' => "J'accepte de m'inscrire à la newsletter de Titan",
                
                
            ])
            // button submit
            ->add('submit', SubmitType::class, [
                'label' => "valider mon inscription"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UsersRegistration::class,
        ]);
    }
}
