<?php declare(strict_types=1);

namespace Core\Bundle\UserBundle\Model;

interface UserInfoInterface
{
    /**
     * @return string
     */
    public function getFirstName(): ?string;

    /**
     * @param string $firstName
     */
    public function setFirstName(?string $firstName): void;

    /**
     * @return string
     */
    public function getLastName(): ?string;

    /**
     * @param string $lastName
     */
    public function setLastName(?string $lastName): void;

    /**
     * @return string
     */
    public function getLocaleCode(): ?string;

    /**
     * @param string $localeCode
     */
    public function setLocaleCode(?string $localeCode): void;

    /**
     * @return int
     */
    public function getTimezone(): ?int;

    /**
     * @param int $timezone
     */
    public function setTimezone(?int $timezone): void;

    /**
     * @return string
     */
    public function getPhoneNumber(): ?string;

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(?string $phoneNumber): void;
}