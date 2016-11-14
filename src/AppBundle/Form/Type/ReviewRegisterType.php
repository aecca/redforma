<?php

namespace AppBundle\Form\Type;

use Redforma\Reviews\Application\Data\AddReviewInput;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ReviewRegisterType
 *
 * @package AppBundle\Form\Type
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class ReviewRegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('companyName',  TextType::class,   ['attr'  => ['placeholder'=> 'Nombres']]);
        $builder->add('companyId',    HiddenType::class, ['empty_data' => -1]);

        $builder->add('title',        TextType::class,  ['attr'  => ['placeholder'=> 'Descripcion breve del incidente']]);
        $builder->add('description',  TextareaType::class,  ['attr'  => ['placeholder'=> 'Descripcion completa']]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => AddReviewInput::class,
        ));
    }

    public function getBlockPrefix()
    {
        return null;
    }

}