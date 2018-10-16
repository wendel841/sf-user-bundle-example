<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle;

use Core\Bundle\UserBundle\DependencyInjection\Compiler\DoctrinePass;
use Core\Bundle\UserBundle\DependencyInjection\Compiler\SyliusPass;
use Sylius\Bundle\ResourceBundle\AbstractResourceBundle;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CoreUserBundle extends AbstractResourceBundle
{
    /**
     * @{inheritDoc}
     */
    public function getSupportedDrivers(): array
    {
        return [
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM,
        ];
    }

    /**
     * @{inheritDoc}
     */
    protected function getModelNamespace(): string
    {
        return 'Core\Bundle\UserBundle\Doctrine\ORM\Entity';
    }

    /**
     * @{inheritDoc}
     */
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->addCompilerPass(new DoctrinePass());
        $container->addCompilerPass(new SyliusPass());
    }
}