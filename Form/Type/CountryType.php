<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\CountryType as AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Intl\Intl;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CountryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
    }

    /**
     * @{inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => $this->getCountryOptions(),
            'required' => false,
        ]);
    }

    /**
     * @{inheritDoc}
     */
    public function getName(): string
    {
        return 'country';
    }

    /**
     * @return array|bool
     */
    protected function getCountryOptions(): array
    {
        $countries = Intl::getRegionBundle()->getCountryNames();

        return array_flip($countries);
    }
}
