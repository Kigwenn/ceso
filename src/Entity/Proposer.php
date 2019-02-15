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
    protected $formations;

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

    public function getCatalogues(): ?int
    {
        return $this->catalogues;
    }

    public function setCatalogues(int $catalogue): self
    {
        $this->catalogues = $catalogue;

        return $this;
    }

    public function getFormation(): ?int
    {
        return $this->formations;
    }

    public function setFormation(int $formation): self
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

    /**
     * Generates the magic method
     */
    public function __toString()
    {
        // to show the name of the Category in the select
        return $this->getFormation();
        // to show the id of the Category in the select
        // return $this->id;

    }
}