<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TProgram
 *
 * @ORM\Table(name="t_program", indexes={@ORM\Index(name="fk_t_program_t_event1", columns={"idevent"})})
 * @ORM\Entity(repositoryClass="App\Repository\TProgramRepository")
 */
class TProgram
{
    /**
     * @var int
     *
     * @ORM\Column(name="idprogram", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idprogram;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="timeperiodStart", type="string", length=45, nullable=false)
     */
    private $timeperiodStart;

    /**
     * @var string
     *
     * @ORM\Column(name="timeperiodEnd", type="string", length=45, nullable=false)
     */
    private $timeperiodEnd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price", type="decimal", precision=5, scale=2, nullable=true, options={"default"="0.00"})
     */
    private $price = '0.00';

    /**
     * @var \TEvent
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\TEvent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idevent", referencedColumnName="idevent")
     * })
     */
    private $idevent;

    public function getIdprogram(): ?int
    {
        return $this->idprogram;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTimeperiodStart(): ?string
    {
        return $this->timeperiodStart;
    }

    public function setTimeperiodStart(string $timeperiodStart): self
    {
        $this->timeperiodStart = $timeperiodStart;

        return $this;
    }

    public function getTimeperiodEnd(): ?string
    {
        return $this->timeperiodEnd;
    }

    public function setTimeperiodEnd(string $timeperiodEnd): self
    {
        $this->timeperiodEnd = $timeperiodEnd;

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

    public function getIdevent(): ?TEvent
    {
        return $this->idevent;
    }

    public function setIdevent(?TEvent $idevent): self
    {
        $this->idevent = $idevent;

        return $this;
    }


}
