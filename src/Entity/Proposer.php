<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProposerRepository")
 */
class Proposer
{
    /**
     * @ORM\ManyToOne(targetEntity=Catalogues::class)
     */
    protected $catalogues;

    /**
     * @ORM\ManyToOne(targetEntity=Formations::class)
     */
    protected $formation;

    /**
     * @ORM\ManyToOne(targetEntity=CentresFormations::class)
     */
    protected $centresFormations;

//    /**
//     * @ORM\ManyToOne(targetEntity="App\Entity\Catalogues", inversedBy="proposer")
//     * @ORM\Column(type="integer")
//     */
//    private $catalogues;
//
//    /**
//     * @ORM\ManyToOne(targetEntity="App\Entity\Formations", inversedBy="proposer")
//     * @ORM\Column(type="integer")
//     */
//    private $formations;
//
//    /**
//     * @ORM\ManyToOne(targetEntity="App\Entity\CentresFormations", inversedBy="proposer")
//     * @ORM\Column(type="integer")
//     */
//    private $centresFormations;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatalogue(): ?int
    {
        return $this->catalogues;
    }

    public function setCatalogue(int $catalogue): self
    {
        $this->catalogues = $catalogue;

        return $this;
    }

    public function getFormations(): ?int
    {
        return $this->formations;
    }

    public function setFormations(int $formation): self
    {
        $this->formations = $formation;

        return $this;
    }

    public function getCentresFormations(): ?int
    {
        return $this->centresFormations;
    }

    public function setCentresFormations(int $centreFormation): self
    {
        $this->centresFormations = $centreFormation;

        return $this;
    }
}
