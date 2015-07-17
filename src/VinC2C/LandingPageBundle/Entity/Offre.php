<?php

namespace VinC2C\LandingPageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="VinC2C\LandingPageBundle\Entity\OffreRepository")
 */
class Offre {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="millesime", type="integer")
     */
    private $millesime;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=255)
     */
    private $couleur;

    /**

     * @ORM\OneToOne(targetEntity="VinC2C\LandingPageBundle\Entity\Image", cascade={"persist"})
     */
    private $image;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Offre
     */
    public function setTitre($titre) {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre() {
        return $this->titre;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return Offre
     */
    public function setPrix($prix) {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer
     */
    public function getPrix() {
        return $this->prix;
    }

    /**
     * Set millesime
     *
     * @param integer $millesime
     * @return Offre
     */
    public function setMillesime($millesime) {
        $this->millesime = $millesime;

        return $this;
    }

    /**
     * Get millesime
     *
     * @return integer
     */
    public function getMillesime() {
        return $this->millesime;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     * @return Offre
     */
    public function setCouleur($couleur) {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur() {
        return $this->couleur;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Offre
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param \VinC2C\LandingPageBundle\Entity\Image $image
     * @return Offre
     */
    public function setImage(\VinC2C\LandingPageBundle\Entity\Image $image = null) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \VinC2C\LandingPageBundle\Entity\Image
     */
    public function getImage() {
        return $this->image;
    }

}
