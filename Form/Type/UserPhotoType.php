<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UserPhotoType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('photo', VichFileType::class, [
                'required' => true,
                'allow_delete' => true,
//                'mapped' => false,
//                'download_label' => '...',
//                'download_uri' => true,
//                'image_uri' => true,
//                'imagine_pattern' => '...',
            ]);
    }
}