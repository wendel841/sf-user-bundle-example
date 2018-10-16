<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\DependencyInjection\Compiler;

use Core\Bundle\UserBundle\Provider\UsernameOrEmailProvider;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class SyliusPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container): void
    {
        $usernameOrEmailProvider = $container->findDefinition('sylius.crm_user_provider.email_or_name_based');
        $usernameOrEmailProvider->setClass(UsernameOrEmailProvider::class);
        $usernameOrEmailProvider->setPublic(true);
    }
}
