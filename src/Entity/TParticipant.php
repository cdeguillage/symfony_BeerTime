<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TParticipant
 *
 * @ORM\Table(name="t_participant", indexes={@ORM\Index(name="fk_t_event_has_t_user_t_user1", columns={"iduser"}), @ORM\Index(name="fk_t_participant_t_tags1", columns={"idtag"}), @ORM\Index(name="IDX_87CE4F10EDAB66BE", columns={"idevent"})})
 * @ORM\Entity(repositoryClass="App\Repository\TParticipantRepository")
 */
class TParticipant
{
    /**
     * @var string
     *
     * @ORM\Column(name="bookingnumber", type="string", length=255, nullable=false)
     */
    private $bookingnumber;

    /**
     * @var \TEvent
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entity\TEvent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idevent", referencedColumnName="idevent")
     * })
     */
    private $idevent;

    /**
     * @var \TUser
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entity\TUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="iduser")
     * })
     */
    private $iduser;

    /**
     * @var \TTags
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\TTags")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtag", referencedColumnName="idtag")
     * })
     */
    private $idtag;

    public function getBookingnumber(): ?string
    {
        return $this->bookingnumber;
    }

    public function setBookingnumber(string $bookingnumber): self
    {
        $this->bookingnumber = $bookingnumber;

        return $this;
    }

    public function getIdevent(): ?TEvent
    {
        return $this->idevent;
    }

    public function setIdevent(?TEvent $idevent): self
    {
        $this->idevent = $idevent;

        return $this;
    }

    public function getIduser(): ?TUser
    {
        return $this->iduser;
    }

    public function setIduser(?TUser $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }

    public function getIdtag(): ?TTags
    {
        return $this->idtag;
    }

    public function setIdtag(?TTags $idtag): self
    {
        $this->idtag = $idtag;

        return $this;
    }


}
