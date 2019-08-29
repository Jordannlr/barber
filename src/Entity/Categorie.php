<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
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
    private $sexe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Coupes", mappedBy="categorie")
     */
    private $coupes;

    public function __construct()
    {
        $this->coupes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * @return Collection|Coupes[]
     */
    public function getCoupes(): Collection
    {
        return $this->coupes;
    }

    public function addCoupe(Coupes $coupe): self
    {
        if (!$this->coupes->contains($coupe)) {
            $this->coupes[] = $coupe;
            $coupe->setCategorie($this);
        }

        return $this;
    }

    public function removeCoupe(Coupes $coupe): self
    {
        if ($this->coupes->contains($coupe)) {
            $this->coupes->removeElement($coupe);
            // set the owning side to null (unless already changed)
            if ($coupe->getCategorie() === $this) {
                $coupe->setCategorie(null);
            }
        }

        return $this;
    }
}
