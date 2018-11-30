<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TEvent
 *
 * @ORM\Table(name="t_event", indexes={@ORM\Index(name="fk_t_event_t_address", columns={"idaddress"}), @ORM\Index(name="fk_t_event_t_user1", columns={"idusercreate"})})
 * @ORM\Entity(repositoryClass="App\Repository\TEventRepository")
 */
class TEvent
{
    /**
     * @var int
     *
     * @ORM\Column(name="idevent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevent;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateevent_start", type="datetime", nullable=false)
     */
    private $dateeventStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateevent_end", type="datetime", nullable=false)
     */
    private $dateeventEnd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price", type="decimal", precision=5, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $price = '0.00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createddate", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createddate = 'CURRENT_TIMESTAMP';

    /**
     * @var \TAddress
     *
     * @ORM\ManyToOne(targetEntity="TAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idaddress", referencedColumnName="idaddress")
     * })
     */
    private $idaddress;

    /**
     * @var \TUser
     *
     * @ORM\ManyToOne(targetEntity="TUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idusercreate", referencedColumnName="iduser")
     * })
     */
    private $idusercreate;


    // public function __construct()
    // {
    //     $this->tags = new ArrayCollection();
    //     $this->participations = new ArrayCollection();
    // }

    public function getIdevent(): ?int
    {
        return $this->idevent;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateeventStart(): ?\DateTimeInterface
    {
        return $this->dateeventStart;
    }

    public function setDateeventStart(\DateTimeInterface $dateeventStart): self
    {
        $this->dateeventStart = $dateeventStart;

        return $this;
    }

    public function getDateeventEnd(): ?\DateTimeInterface
    {
        return $this->dateeventEnd;
    }

    public function setDateeventEnd(\DateTimeInterface $dateeventEnd): self
    {
        $this->dateeventEnd = $dateeventEnd;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): self
    {
        $this->price = $price;

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

    public function getIdaddress(): ?TAddress
    {
        return $this->idaddress;
    }

    public function setIdaddress(?TAddress $idaddress): self
    {
        $this->idaddress = $idaddress;

        return $this;
    }

    public function getIdusercreate(): ?TUser
    {
        return $this->idusercreate;
    }

    public function setIdusercreate(?TUser $idusercreate): self
    {
        $this->idusercreate = $idusercreate;

        return $this;
    }


}
