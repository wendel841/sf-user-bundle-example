<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\Doctrine\ORM\Entity;

use App\Doctrine\Traits\UuidableTrait;
use Core\Bundle\UserBundle\Model\UserInfoInterface;
use Core\Bundle\UserBundle\Model\UserInterface;
use Sylius\Component\User\Model\User as BaseUser;

class User extends BaseUser implements UserInterface, UserInfoInterface
{
    use UuidableTrait;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $localeCode;

    /**
     * @var int
     */
    protected $timezone;

    /**
     * @var string
     */
    protected $phoneNumber;

    public function __construct()
    {
        parent::__construct();

        $this->getUuid();
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getLocaleCode(): ?string
    {
        return $this->localeCode;
    }

    /**
     * @param string $localeCode
     */
    public function setLocaleCode(?string $localeCode): void
    {
        $this->localeCode = $localeCode;
    }

    /**
     * @return int
     */
    public function getTimezone(): ?int
    {
        return $this->timezone;
    }

    /**
     * @param int $timezone
     */
    public function setTimezone(?int $timezone): void
    {
        $this->timezone = $timezone;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }
}