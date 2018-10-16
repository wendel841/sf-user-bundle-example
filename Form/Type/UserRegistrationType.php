<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Łukasz Chruściel <lukasz.chrusciel@lakion.com>
 */
final class UserRegistrationType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'form.user.registration.label.username',
                'attr' => [
                    'placeholder' => 'form.user.registration.placeholder.username',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'form.user.registration.label.email',
                'attr' => [
                    'placeholder' => 'form.user.registration.placeholder.email',
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'sylius.form.user.password.label',
                    'attr' => [
                        'placeholder' => 'form.user.registration.placeholder.password',
                    ]
                ],
                'second_options' => ['label' => 'sylius.form.user.password.confirmation',
                    'attr' => [
                        'placeholder' => 'form.user.registration.placeholder.password',
                    ],
                ],
                'invalid_message' => 'sylius.user.plainPassword.mismatch',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'sylius_crm_user_registration';
    }
}
