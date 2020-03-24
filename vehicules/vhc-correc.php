<?php

require_once "Pompe.php";

abstract class Vhc
{
    /**
     * @var string
     */
    private $typeCarburant;

    /**
     * @var int
     */
    private $vitesseMax;

    /**
     * @var int
     */
    private $vitesse = 0;

    /**
     * @var int
     */
    private $contenanceReservoir;

    private static $carburantsAcceptes = [
        "SP95",
        "SP98"
    ];

    /**
     * @var int
     */
    private $contenuReservoir;

    public function __construct(
        string $typeCarburant,
        int $vitesseMax,
        int $contenanceReservoir,
        int $contenuReservoir
    )
    {
        $this
            ->setTypeCarburant($typeCarburant)
            ->setVitesseMax($vitesseMax)
            ->setContenanceReservoir($contenanceReservoir)
            ->setContenuReservoir($contenuReservoir);
        
    }


    /**
     * Get the value of typeCarburant
     *
     * @return  string
     */ 
    public function getTypeCarburant(): string
    {
        return $this->typeCarburant;
    }

    /**
     * Set the value of typeCarburant
     *
     * @param  string  $typeCarburant
     *
     * @return  self
     */ 
    public function setTypeCarburant(string $typeCarburant): self
    {
        
        if(!in_array($typeCarburant, self::$carburantsAcceptes)){
            trigger_error("Le type de carburant doit être " . implode(" ou ", self::$carburantsAcceptes),
            E_USER_ERROR
        );
        }
        $this->typeCarburant = $typeCarburant;

        return $this;
    }

    /**
     * Get the value of vitesseMax
     *
     * @return  int
     */ 
    public function getVitesseMax(): int
    {
        return $this->vitesseMax;
    }

    /**
     * Set the value of vitesseMax
     *
     * @param  int  $vitesseMax
     *
     * @return  self
     */ 
    public function setVitesseMax(int $vitesseMax): self
    {
        $this->vitesseMax = $vitesseMax;

        return $this;
    }

    /**
     * Get the value of vitesse
     *
     * @return  int
     */ 
    public function getVitesse(): int
    {
        return $this->vitesse;
    }

    /**
     * Set the value of vitesse
     *
     * @param  int  $vitesse
     *
     * @return  self
     */ 
    public function setVitesse(int $vitesse): self
    {
        if($vitesse > $this->vitesseMax){
            //Si la vitesse dépasse la vitesse max on redéfinit la vitesse à la vitesse max du véhicule
            $vitesse = $this->vitesseMax;
        }

        $this->vitesse = $vitesse;

        return $this;
    }

    /**
     * Get the value of contenanceReservoir
     *
     * @return  int
     */ 
    public function getContenanceReservoir(): int
    {
        return $this->contenanceReservoir;
    }

    /**
     * Set the value of contenanceReservoir
     *
     * @param  int  $contenanceReservoir
     *
     * @return  self
     */ 
    public function setContenanceReservoir(int $contenanceReservoir): self
    {
        $this->contenanceReservoir = $contenanceReservoir;

        return $this;
    }

    /**
     * Get the value of contenuReservoir
     *
     * @return  int
     */ 
    public function getContenuReservoir(): int
    {
        return $this->contenuReservoir;
    }

    /**
     * Set the value of contenuReservoir
     *
     * @param  int  $contenuReservoir
     *
     * @return  self
     */ 
    public function setContenuReservoir(int $contenuReservoir): self
    {
        $this->contenuReservoir = $contenuReservoir;

        return $this;
    }

    public function accelerer(int $kmh): void
    {
        $this->setVitesse($this->vitesse + $kmh);
    }


    //Méthode abstraite pour forcer les motos et voitures à avoir les getteurs pour le nb de roues mais pas besoin ici de les décrire
    abstract public function getNbRoues(): int;

    //On met la pompe en paramètre de la méthode faire le plein
    /**
     * @param  Pompe  $pompe
     */
    // public function fairePlein($pompe)
    // {
    //     if($pompe->getTypeCarburant() != $this->typeCarburant){
    //         trigger_error("Vous ne pouvez pas utiliser cette pompe car elle n'a pas le bon carburant. Il vous faut du " . $this->typeCarburant,
    //         E_USER_ERROR);
    //     } elseif ($pompe->getContenuPompe() <= ($this->contenanceReservoir - $this->contenuReservoir)){
    //         $this->contenuReservoir += $pompe->getContenuPompe();
    //         $pompe->setContenuPompe(0);
    //     } else {
    //         $quantitePompe = $pompe->getContenuPompe() - ($this->contenanceReservoir - $this->contenuReservoir);
    //         $pompe->setContenuPompe($quantitePompe);
    //         $this->contenuReservoir = $this->contenanceReservoir;
    //     }

    //     return $this;
    // }

    //Correction Pompe
    public function fairePlein(Pompe $pompe)
    {
        
        if($this->typeCarburant != $pompe->getTypeCarburant()){
            echo "Stop ! Erreur de pompe";
            //POur sortir de la fonction et ainsi ne pas faire le plain
            return;
        }
        
        //Quantité de carburant nécessaire
        $besoinCarburant = $this->contenanceReservoir - $this->contenuReservoir;

        if($besoinCarburant > $pompe->getContenuPompe()){
            $besoinCarburant = $pompe->getContenuPompe();
        }

        //MAJ du contenu du réservoir du véhicule
        $this->setContenuReservoir($this->contenuReservoir + $besoinCarburant);

        //MAJ du contenu de la pompe
        $pompe->setContenuPompe($pompe->getContenuPompe() - $besoinCarburant);
    }
}