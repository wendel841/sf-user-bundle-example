<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\Form\Type;

use Sylius\Bundle\UserBundle\Form\Type\UserType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CrmUserType extends UserType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $model = $builder->getData();

        $builder->remove('enabled');
//        $builder->remove('plainPassword');

        $builder->get('plainPassword')->setRequired(!$model->getId());
//        $builder->add('plain_password', PasswordType::class, [
//            'label' => 'sylius.form.user.password.label',
//            'required' => !$model->getId(),
//            'property_path' => 'plainPassword',
//        ]);

        $builder
            ->add('first_name', TextType::class, [
                'property_path' => 'firstName',
                'required' => false,
            ])
            ->add('last_name', TextType::class, [
                'property_path' => 'lastName',
                'required' => false,
            ])
            ->add('timezone', NumberType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => 'sylius.ui.optional',
                ],
            ])
            ->add('phone_number', TextType::class, [
                'required' => false,
                'property_path' => 'phoneNumber',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'crm_user';
    }
}