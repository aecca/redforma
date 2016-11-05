<?php

namespace AppBundle\Form\Type;

use Redforma\Identity\Application\Data\RegisterUserInput;
use Redforma\Identity\Domain\Model\User\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UserRegisterType
 *
 * @package AppBundle\Form\Type
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class UserRegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', TextType::class,  ['attr'  => ['placeholder'=> 'Nombres']]);
        $builder->add('lastName',  TextType::class,  ['attr'  => ['placeholder'=> 'Nombres']]);
        $builder->add('email',     EmailType::class, ['attr'  => ['placeholder'=> 'usuario@perured.com']]);

        $builder->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'Las contraseñas no coinciden',
            'first_options'  => ['label' => 'Password', 'attr' => ['placeholder' => '****']],
            'second_options' => ['label' => 'Repeat Password', 'attr' => ['placeholder' => '****']],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => RegisterUserInput::class,
        ));
    }

    public function getBlockPrefix()
    {
        return null;
    }

}