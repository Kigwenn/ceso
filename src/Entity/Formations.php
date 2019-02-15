<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationsRepository")
 */
class Formations
{
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Proposer", mappedBy="formations")
     */
    private $proposer;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_deb;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_participant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDeb(): ?\DateTimeInterface
    {
        return $this->date_deb;
    }

    public function setDateDeb(\DateTimeInterface $date_deb): self
    {
        $this->date_deb = $date_deb;

        return $this;
    }

    public function getNbParticipant(): ?int
    {
        return $this->nb_participant;
    }

    public function setNbParticipant(int $nb_participant): self
    {
        $this->nb_participant = $nb_participant;

        return $this;
    }
}
