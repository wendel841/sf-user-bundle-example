<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\DependencyInjection\Compiler;

use Core\Bundle\UserBundle\Model\UserInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class DoctrinePass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container): void
    {
        $rte = $container->findDefinition('doctrine.orm.listeners.resolve_target_entity');

        $rte->addMethodCall('addResolveTargetEntity', [
            UserInterface::class, $container->getParameter('sylius.model.crm_user.class'), [],
        ]);
    }
}
