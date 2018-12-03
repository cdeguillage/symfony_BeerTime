<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TUser
 *
 * @ORM\Table(name="t_user")
 * @ORM\Entity(repositoryClass="App\Repository\TUserRepository")
 */
class TUser
{
    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="App\Entity\TEvent", inversedBy="iduser")
     * @ORM\Column(name="iduser", type="integer", nullable=false)
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     * 
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createddate", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createddate = 'CURRENT_TIMESTAMP';

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array", length=0, nullable=false)
     */
    private $roles = [];

    /**
     * @var bool
     *
     * @ORM\Column(name="connected", type="boolean", nullable=false)
     */
    private $connected = '0';


    public function __constructor() {
        // 
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCreateddate(): ?\DateTimeInterface
    {
        return $this->createddate;
    }

    public function setCreateddate(\DateTimeInterface $createddate): self
    {
        $this->createddate = $createddate;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getConnected(): ?bool
    {
        return $this->connected;
    }

    public function setConnected(bool $connected): self
    {
        $this->connected = $connected;

        return $this;
    }


}
