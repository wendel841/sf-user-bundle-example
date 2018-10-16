<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\Provider;

//use Core\Bundle\UserBundle\Model\UserInterface;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\User\UserInterface;

final class UserProvider implements UserProviderInterface
{
    /**
     * @var Registry
     */
    private $doctrine;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    public function __construct(Registry $doctrine, TokenStorageInterface $tokenStorage)
    {
        $this->doctrine = $doctrine;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @{inheritDoc}
     */
    public function getCurrent(): UserInterface
    {
        $token = $this->tokenStorage->getToken();

        if (!$token) {
            throw new UnauthorizedHttpException('Current user not found!');
        }

        $user = $token->getUser();

        if (!$user instanceof UserInterface) {
            throw new UnauthorizedHttpException('Current user not found!');
        }

        return $user;
    }

    /**
     * @param UserInterface $user
     * @return TokenInterface
     */
    public function createAuthToken(UserInterface $user): TokenInterface
    {
        $token = new UsernamePasswordToken($user, $user->getPassword(), static::SECURITY_FIREWALL_NAME, $user->getRoles());

        return $token;
    }
}