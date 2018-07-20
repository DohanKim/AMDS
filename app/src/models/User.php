<?php

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="users")
 */

class User
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=60, nullable=false)
     */
    private $passwordHash;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=60)
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $isEmailVerified;

    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $registeredAt;

    public function __construct(string $email, string $password, string $name)
    {
        $this->email = $email;
        $this->passwordHash = password_hash($password, PASSWORD_BCRYPT);
		$this->name = $name;
		$this->isEmailVerified = false;
        $this->registeredAt = new \DateTimeImmutable('now');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIsEmailVerified(): boolean
    {
        return $this->isEmailVerified;
    }

    public function getRegisteredAt(): \DateTimeImmutable
    {
        return $this->registeredAt;
    }
}
