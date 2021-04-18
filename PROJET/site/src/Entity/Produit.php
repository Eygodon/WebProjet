<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 * @ORM\Table(name="Im2021_Produits")
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     * @Assert\NotNull (message="empty field")
     * @Assert\Length (max=64)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull (message="empty field")
     * @Assert\Positive( message="Must be > 0")
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull (message="empty field")
     * @Assert\Positive (message="Must be > 0")
     */
    private $quantity;

    /**
     * @ORM\OneToMany(targetEntity=Panier::class, mappedBy="produit")
     */
    private $Commandes;

    public function __construct()
    {
        $this->Commandes = new ArrayCollection();
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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return Collection|Panier[]
     */
    public function getCommandes(): Collection
    {
        return $this->Commandes;
    }

    public function addCommande(Panier $commande): self
    {
        if (!$this->Commandes->contains($commande)) {
            $this->Commandes[] = $commande;
            $commande->setProduit($this);
        }

        return $this;
    }

    public function removeCommande(Panier $commande): self
    {
        if ($this->Commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getProduit() === $this) {
                $commande->setProduit(null);
            }
        }

        return $this;
    }
}
//Berthelot Yann