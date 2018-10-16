<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\EventListener;

use Core\Bundle\UserBundle\Model\UserAwareInterface;
use Core\Bundle\UserBundle\Model\UserInterface;
use Core\Bundle\UserBundle\Provider\UserProviderInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class UserAwareListener implements EventSubscriber
{
    /**
     * @var UserProviderInterface
     */
    protected $userProvider;

    public function __construct(UserProviderInterface $userProvider)
    {
        $this->userProvider = $userProvider;
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if (!$entity instanceof UserAwareInterface) {
            return;
        }

        $user = $entity->getUser();

        if ($user instanceof UserInterface) {
            return;
        }

        $current = $this->userProvider->getCurrent();
        $entity->setUser($current);
    }

    /**
     * @return array
     */
    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
        ];
    }
}