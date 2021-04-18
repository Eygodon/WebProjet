<?php

namespace App\Entity;

use App\Repository\UtilisateursRepository;
use Cassandra\Date;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\SmallIntType;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * @ORM\Entity(repositoryClass=UtilisateursRepository::class)
 * @ORM\Table(name="Im2021_Utilisateurs", options={"comment":"table des utilisaterus du site"})
 */
class Utilisateurs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $pk;

    /**
     * @ORM\Column(type="string", length=30, options={"comment":"sert de login ( doit être unique)"}
     *     , unique=true)
     * @Assert\NotBlank(message="l'identifiant ne peut pas être vide")
     * @Assert\NotNull(message="L'identifiant ne peut pas être null")
     * @Assert\Length(max=30)
     */
    private $identifiant;

    /**
     * @ORM\Column(type="string", length=64, options={"comment":"mot de passe crypté : il faut une taille assez grande pour ne pas le tronquer"})
     * @Assert\NotNull (message="le mot de passe de peut pas être null")
     * @Assert\Length (max=64)
     * @Assert\NotBlank (message="Le mot de passe ne peut pas être vide")
     */
    private $motdepasse;

    /**
     * @ORM\Column(type="string", length=30, nullable=true, options={"default": NULL} )
     * @Assert\Length(max=30)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30, nullable=true, options={"default": NULL})
     * @Assert\Length (max=30)
     */
    private $prenom;



    /**
     * @ORM\Column(type="integer", options={"default": 0})
     * @Assert\Range(min=0, max=1, notInRangeMessage="Choisir entre 0 et 1")
     */
    private $isadmin;


    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $anniversaire;

    /**
     * @ORM\OneToMany(targetEntity=Panier::class, mappedBy="Acheteurs")
     */
    private $Panier;

    public function __construct()
    {
        $this->Panier = new ArrayCollection();
    }



    public function getPk(): ?int
    {
        return $this->pk;
    }

    public function setPk(int $pk): self
    {
        $this->pk = $pk;
        return $this;
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function setIdentifiant(string $identifiant): self
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(string $motdepasse): self
    {
        $this->motdepasse = sha1($motdepasse);

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

   

    public function getIsadmin(): ?int
    {
        return $this->isadmin;
    }

    public function setIsadmin(int $isadmin): self
    {
        $this->isadmin = $isadmin;

        return $this;
    }

    public function getAnniversaire(): ?\DateTimeInterface
    {
        return $this->anniversaire;
    }

    public function setAnniversaire(?\DateTimeInterface $anniversaire): self
    {
        $this->anniversaire = $anniversaire;

        return $this;
    }

    /**
     * @return Collection|Panier[]
     */
    public function getPanier(): Collection
    {
        return $this->Panier;
    }

    public function addPanier(Panier $panier): self
    {
        if (!$this->Panier->contains($panier)) {
            $this->Panier[] = $panier;
            $panier->setAcheteurs($this);
        }

        return $this;
    }

    public function removePanier(Panier $panier): self
    {
        if ($this->Panier->removeElement($panier)) {
            // set the owning side to null (unless already changed)
            if ($panier->getAcheteurs() === $this) {
                $panier->setAcheteurs(null);
            }
        }

        return $this;
    }
}
//Berthelot Yann