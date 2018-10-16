<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\Doctrine\Traits;

use Core\Bundle\UserBundle\Model\UserInterface;

trait UserAwareTrait
{
    /**
     * @var UserInterface
     */
    protected $user;

    /**
     * @return mixed
     */
    public function getUser(): ?UserInterface
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser(UserInterface $user = null)
    {
        $this->user = $user;
    }
}