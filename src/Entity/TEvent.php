<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

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
     * 
     * @ORM\Column(name="dateeventstart", type="datetime", nullable=false)
     */
    private $dateeventStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateeventend", type="datetime", nullable=false)
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
     * @Assert\Range(
     *      min = 0,
     *      max = 255,
     *      minMessage = "Le montant est de {{ limit }} € minimum !",
     *      maxMessage = "Le montant est de {{ limit }} € maximum !"
     * )
     * @ORM\Column(name="createddate", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createddate = 'CURRENT_TIMESTAMP';

    /**
     * @var \TAddress
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\TAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idaddress", referencedColumnName="idaddress")
     * })
     */
    private $idaddress;

    /**
     * @var \TUser
     *
     * @ORM\OneToOne(targetEntity="App\Entity\TUser", mappedBy="idusercreate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idusercreate", referencedColumnName="iduser")
     * })
     */
    private $idusercreate;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="event", orphanRemoval=true)
     */
    private $comments;


    public function __construct()
    {
        $this->idaddress = new ArrayCollection();
        $this->idusercreate = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

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

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setEvent($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getEvent() === $this) {
                $comment->setEvent(null);
            }
        }

        return $this;
    }


}
