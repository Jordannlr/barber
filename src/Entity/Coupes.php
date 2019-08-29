<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoupesRepository")
 */
class Coupes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="coupes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\Column(type="integer")
     */
    private $tarif;

    public function getId() 
    {
        return $this->id;
    }

    public function getTitre() 
    {
        return $this->titre;
    }

    public function setTitre() 
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription() 
    {
        return $this->description;
    }

    public function setDescription()
    {
        $this->description = $description;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage()
    {
        $this->image = $image;

        return $this;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setCategorie()
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getTarif()
    {
        return $this->tarif;
    }

    public function setTarif()
    {
        $this->tarif = $tarif;

        return $this;
    }
}
