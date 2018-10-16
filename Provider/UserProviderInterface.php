<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\Provider;

use Symfony\Component\Security\Core\User\UserInterface;
//use Core\Bundle\UserBundle\Model\UserInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

interface UserProviderInterface
{
    const SECURITY_FIREWALL_NAME = 'sylius_crm_user_provider';

    const DEFAULT_USERNAME = 'ivan';
    const DEFAULT_PASSWORD = '123456';
    const DEMO_USERNAME = 'demo';

    /**
     * @return UserInterface
     */
    public function getCurrent(): UserInterface;

    /**
     * @param UserInterface $user
     * @return TokenInterface
     */
    public function createAuthToken(UserInterface $user): TokenInterface;
}