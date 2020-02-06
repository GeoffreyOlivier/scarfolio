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
    private $libelle;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\categorie", mappedBy="categorie")
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photos", mappedBy="categorie")
     */
    private $photos;



    public function __construct()
    {
        $this->categorie = new ArrayCollection();
        $this->photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Dossier[]
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Dossier $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie[] = $categorie;
            $categorie->SetCategorie($this);
        }

        return $this;
    }

    public function removeCategorie(Dossier $categorie): self
    {
        if ($this->categorie->contains($categorie)) {
            $this->categorie->removeElement($categorie);
            // set the owning side to null (unless already changed)
            if ($categorie->getCategorie() === $this) {
                $categorie->SetCategorie(null);
            }
        }

        return $this;
    }
    
      public function __toString()
    {
        return $this->libelle;
    }

      /**
       * @return Collection|Photos[]
       */
      public function getPhotos(): Collection
      {
          return $this->photos;
      }

      public function addPhoto(Photos $photo): self
      {
          if (!$this->photos->contains($photo)) {
              $this->photos[] = $photo;
              $photo->setCategorie($this);
          }

          return $this;
      }

      public function removePhoto(Photos $photo): self
      {
          if ($this->photos->contains($photo)) {
              $this->photos->removeElement($photo);
              // set the owning side to null (unless already changed)
              if ($photo->getCategorie() === $this) {
                  $photo->setCategorie(null);
              }
          }

          return $this;
      }
}
