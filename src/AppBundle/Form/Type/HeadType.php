<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
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
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use AppBundle\Form\FilesType;


class HeadType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
// zawaansowane ->

            ->add('body', TextType::class, array(
                    "mapped" => false,
                    'label' => 'Krótki opis',
                    'required' => false,
                    'label_attr' => array('class' => 'visible_label',
                        'style' => 'display: none;',
                        'id' => 'exp_middle',),
                    'attr' => array(
                        'class' => 'form-control',
                        'style' => 'margin-bottom:15px; display: none;')
                )
            )


// standart ->

            ->add('title', TextType::class, array(
                    "mapped" => false,
                    'label'    => 'Widoczna od teraz',
                    'required' => false,
                )
            )
            ->add('meta_description', TextType::class, array(
                    "mapped" => false,
                    'label'    => 'Widoczna od teraz',
                    'required' => false,
                )
            )
            ->add('meta_keywords', TextType::class, array(
                    "mapped" => false,
                    'label'    => 'Widoczna od teraz',
                    'required' => false,
                )
            )
            /*
             *
    <option value="" selected="selected">Index, Follow</option>
	<option value="noindex, follow">No index, follow</option>
	<option value="index, nofollow">Index, No follow</option>
	<option value="noindex, nofollow">No index, no follow</option>
             */
            ->add('robots', ChoiceType::class, array(
                    "mapped" => false,
                    'choices' => array(
                        'Index, Follow' => true,
                        'No index, follow' => 'noindex, follow',
                        'Index, No follow' => 'index, nofollow',
                        'No index, no follow' => 'noindex, nofollow'
                    ),

                    'label'    => 'robots',
                    'required' => false,
                )
            )

            ->add('save', SubmitType::class, array('label' => 'Zapisz', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Head'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_head';
    }


}
