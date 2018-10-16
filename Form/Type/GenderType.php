<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\Form\Type;

use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class GenderType extends AbstractType
{
    /**
     * @var array
     */
    protected $choices = [];

    /**
     * @var TranslatorInterface
     */
    protected $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->choices = [
            'm' => $translator->trans('gender.male'),
            'f' => $translator->trans('gender.female'),
        ];
    }

    /**
     * @{inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'choices' => array_flip($this->choices),
            'required' => true,
        ]);
    }

    /**
     * @{inheritDoc}
     */
    public function getParent(): string
    {
        return ChoiceType::class;
    }
}