<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\Model;

interface UserAwareInterface
{
    /**
     * @return mixed
     */
    public function getUser(): ?UserInterface;

    /**
     * @param mixed $user
     */
    public function setUser(UserInterface $user = null);
}