<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PanierRepository::class)
 * @ORM\Table (name="Im2021_Panier")
 */
class Panier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateurs::class, inversedBy="Panier")
     *  @ORM\JoinColumn(name="user_pk", referencedColumnName="pk")
     */
    private $Acheteurs;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="Commandes")
     */
    private $produit;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getAcheteurs(): ?Utilisateurs
    {
        return $this->Acheteurs;
    }

    public function setAcheteurs(?Utilisateurs $Acheteurs): self
    {
        $this->Acheteurs = $Acheteurs;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produits): self
    {
        $this->produit = $produits;

        return $this;
    }
}
//Berthelot Yann