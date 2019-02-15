<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComposerRepository")
 */
class Composer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_Eleves;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_Salles;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_Formateurs;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_Materiels;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEleves(): ?int
    {
        return $this->id_Eleves;
    }

    public function setIdEleves(int $id_Eleves): self
    {
        $this->id_Eleves = $id_Eleves;

        return $this;
    }

    public function getIdSalles(): ?int
    {
        return $this->id_Salles;
    }

    public function setIdSalles(int $id_Salles): self
    {
        $this->id_Salles = $id_Salles;

        return $this;
    }

    public function getIdFormateurs(): ?int
    {
        return $this->id_Formateurs;
    }

    public function setIdFormateurs(int $id_Formateurs): self
    {
        $this->id_Formateurs = $id_Formateurs;

        return $this;
    }

    public function getIdMateriels(): ?int
    {
        return $this->id_Materiels;
    }

    public function setIdMateriels(int $id_Materiels): self
    {
        $this->id_Materiels = $id_Materiels;

        return $this;
    }
}
