<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * TEvent
 * @Assert\Expression(
 *      "this.getPosterurl() or this.getPosterfile()",
 *      message="Vous devez saisir une URL ou charger une image !"
 * )
 * @ORM\Table(name="t_event", indexes={@ORM\Index(name="fk_t_event_t_address", columns={"idaddress"}), @ORM\Index(name="fk_t_event_t_user1", columns={"idusercreate"})})
 * @ORM\Entity(repositoryClass="App\Repository\TEventRepository")
 */
class TEvent
{
    /**
     * @var int
     *
     * @ORM\Column(name="idevent", type="integer", nullable=false)
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevent;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "La taille minimale est de {{ limit }} !",
     *      maxMessage = "La taille maximale est de {{ limit }} !"
     * )
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "La taille minimale est de {{ limit }} !",
     *      maxMessage = "La taille maximale est de {{ limit }} !"
     * )
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     * @Assert\NotBlank
     * @Assert\GreaterThanOrEqual("today")
     * @ORM\Column(name="dateeventstart", type="datetime", nullable=false)
     */
    private $dateeventStart;

    /**
     * @var \DateTime
     * @Assert\NotBlank
     * @Assert\GreaterThanOrEqual(propertyPath="dateeventstart")
     * @ORM\Column(name="dateeventend", type="datetime", nullable=false)
     */
    private $dateeventEnd;

    /**
     * @var string|null
     * @Assert\GreaterThanOrEqual(0)
     * @Assert\Type(type="float",
     *              message="Simplement un nombre supérieur à 0 !"
     * )
     * @ORM\Column(name="price", type="decimal", precision=5, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $price = '0.00';

    /**
     * @var string|null
     * @ORM\Column(name="poster", type="string", nullable=true)
     */
    private $poster;

    /**
     * @var string|null
     * @Assert\Url
     */
    private $posterurl;

    // En accord avec le PHP.ini !!!
    /**
     * @Assert\Image(
     *      maxSize = "2048k"
     * )
     */
    private $posterfile;

    // /**
    //  * @var \DateTime
    //  * 
    //  * @ORM\Column(name="createddate", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
    //  */
    // private $createddate = date();

    // * @ORM\JoinColumns({
    // *   @ORM\JoinColumn(name="idaddress", referencedColumnName="idaddress")
    // * })
    
    /**
     * @var \TAddress
     * @ORM\ManyToOne(targetEntity="App\Entity\TAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idaddress", referencedColumnName="idaddress")
     * })
     */
    private $TAddress;

    /**
     * @var \TAddress
     * @ORM\ManyToOne(targetEntity="App\Entity\TAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idaddress", referencedColumnName="idaddress")
     * })
     */
    private $idaddress;

    /**
     * @var \TUser
     * @ORM\ManyToOne(targetEntity="App\Entity\TUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idusercreate", referencedColumnName="iduser")
     * })
     */
    private $idusercreate;

    /**
     * @var \TUser
     * @ORM\ManyToOne(targetEntity="App\Entity\TUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idusercreate", referencedColumnName="iduser")
     * })
     */
    private $TUser;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\TTags", mappedBy="event")
     */
    private $tags;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\TParticipant", mappedBy="event")
     */
    private $participants;


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

    public function getPoster()
    {
        return $this->poster;
    }

    public function setPoster($poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getPosterurl()
    {
        return $this->posterurl;
    }

    public function setPosterurl($posterurl): self
    {
        $this->posterurl = $posterurl;

        return $this;
    }

    public function getPosterfile()
    {
        return $this->posterfile;
    }

    public function setPosterfile($posterfile): self
    {
        $this->posterfile = $posterfile;

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

    // public function getCreateddate(): ?\DateTimeInterface
    // {
    //     return $this->createddate;
    // }

    // public function setCreateddate(\DateTimeInterface $createddate): self
    // {
    //     $this->createddate = $createddate;

    //     return $this;
    // }

    public function getTAddress(): ?TAddress
    {
        return $this->$TAddress;
    }

    public function setTAddress(?TAddress $TAddress): self
    {
        $this->TAddress = $TAddress;

        return $this;
    }

    public function getTUser(): ?TUser
    {
        return $this->TUser;
    }

    public function setTUser(?TUser $TUser): self
    {
        $this->TUser = $TUser;

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

    public function getIdaddress(): ?TAddress
    {
        return $this->idaddress;
    }

    public function setIdaddress(?TAddress $idaddress): self
    {
        $this->idaddress = $idaddress;

        return $this;
    }

    // ////////////////////////////////
    // DECLARATION DES COLLECTIONS
    // ////////////////////////////////
    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->participants = new ArrayCollection(); 
    }

    // ////////////////////////////////
    // DEFINITION DES COLLECTIONS
    // ////////////////////////////////

    /**
     * @return Collection|TParticipant[]
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant( TParticipant $participant ): self
    {
        if (!$this->participants->contains( $participant )) {
            $this->participants[] = $participant;
            $participant->setEvent($this);
        }

        return $this;
    }

    public function removeParticipant( TParticipant $participant ): self
    {
        if ($this->participants->contains( $participant )) {
            $this->participants->removeElement( $participant );
            // set the owning side to null (unless already changed)
            if ($participant->getEvent() === $this) {
                $participant->setEvent(null);
            }
        }

        return $this;
    }


}
