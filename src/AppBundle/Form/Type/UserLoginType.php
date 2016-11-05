<?php

namespace AppBundle\Form\Type;

use Redforma\Identity\Domain\Model\User\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class Auth
 *
 * @package AppBundle\Form\Type
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class UserLoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', EmailType::class, ['attr' => ['placeholder'=> 'usuario@perured.com']]);
        $builder->add('password', PasswordType::class, ['attr' => ['placeholder' => '****']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $user = new User();
        $user->setEmail('usuario@redforma.pe');
        $user->setPassword('123456');

        $resolver->setDefaults(array(
            'data_class' => User::class,
            'empty_data' => $user
        ));
    }

    public function getBlockPrefix()
    {
        return null;
    }

}