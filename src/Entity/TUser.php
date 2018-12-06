<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

// use App\Entity\TEvent;

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

    // /**
    //  * @var \DateTime
    //  *
    //  * @ORM\Column(name="createddate", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
    //  */
    // private $createddate;

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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TEvent", mappedBy="idusercreate")
     */
    private $events;

    // /**
    //  * @ORM\OneToMany(targetEntity="App\Entity\TParticipant", mappedBy="idevent,iduser,idtag")
    //  */
    // private $participants;


    public function __construct() {
        $this->events = new ArrayCollection();
        // $this->participants = new ArrayCollection();
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

    // public function getCreateddate(): ?\DateTimeInterface
    // {
    //     return $this->createddate;
    // }

    // public function setCreateddate(\DateTimeInterface $createddate): self
    // {
    //     $this->createddate = $createddate;

    //     return $this;
    // }

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

    /**
     * @return Collection|TEvent[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent( TEvent $event ): self
    {
        if ( $this->events->contains( $event ))
        {
            $this->events[] = $event;
            $event->setTUser( $this );
        }
    }

    public function removeEvent( TEvent $event ): self
    {
        if ( $this->events->contains( $event ))
        {
            $this->removeElement( $event );
            if ($event->getTUser() === $this)
            {
                $event->setTUser( null );
            }
        }
    }

    // /**
    //  * @return Collection|TParticipant[]
    //  */
    // public function getParticipations(): Collection
    // {
    //     return $this->participations;
    // }

    // public function addParticipation( TParticipation $participation ): self
    // {
    //     if ( $this->participations->contains( $participation ))
    //     {
    //         $this->participations[] = $participation;
    //         $event->setTUser( $this );
    //     }
    // }

    // public function removeParticipation( TParticipation $participation ): self
    // {
    //     if ( $this->participations->contains( $participation ))
    //     {
    //         $this->removeElement( $participation );
    //         if ($event->getTUser() === $this)
    //         {
    //             $event->setTUser( null );
    //         }
    //     }
    // }

}
