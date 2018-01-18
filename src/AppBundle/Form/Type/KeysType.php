<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class KeysType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                    'label' => 'Name',
                    'attr' => array(
                        'class' => 'form-control',
                        'style' => 'margin-bottom:15px')
                )
            )
            ->add('password', RepeatedType::class, array(
                'required'    => false,
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')),
                'second_options' => array('label' => 'Repeat Password', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')),
                'attr' => array(
                    'class' => 'form-control',
                    'style' => 'margin-bottom:15px',
                )
            ))
            ->add('url', TextType::class, array(
                    'label' => 'Url',
                    'attr' => array(
                        'class' => 'form-control',
                        'style' => 'margin-bottom:15px')
                )
            )
            ->add('description', TextType::class, array(
                    'label' => 'Description',
                    'attr' => array(
                        'class' => 'form-control',
                        'style' => 'margin-bottom:15px')
                )
            )
            ->add('password_key', PasswordType::class, array(
                'required'    => false,
                'mapped' => false,
                'label' => 'Key',
                'attr' => array(
                    'class' => 'form-control',
                    'style' => 'margin-bottom:15px')
            ))
            ->add('save', SubmitType::class, array('label' => 'Save', 'attr' => array('class' => 'BT editBT', 'style' => 'margin-bottom:15px')));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Keys'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_keys';
    }


}
