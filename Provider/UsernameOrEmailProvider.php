<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\Provider;

use App\Utils\UUIDHelper;
use Sylius\Bundle\UserBundle\Provider\AbstractUserProvider;
use Symfony\Component\Security\Core\User\UserInterface;

class UsernameOrEmailProvider extends AbstractUserProvider
{
    /**
     * {@inheritdoc}
     */
    protected function findUser(string $usernameOrEmail): ?UserInterface
    {
        if (UUIDHelper::isUUID($usernameOrEmail)) {
            return $this->userRepository->findOneBy(['uuid' => $usernameOrEmail]);
        }

        if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
            return $this->userRepository->findOneByEmail($usernameOrEmail);
        }

        return $this->userRepository->findOneBy(['usernameCanonical' => $usernameOrEmail]);
    }
}
