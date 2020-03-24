<?php

require_once "Pompe.php";

/*
Créer une classe abstraite Vehicule
2 classes qui en héritent : Moto et Voiture
qui vont contenir des méthodes pour retourner :
- typeCarburant : le type de carburant (SP95 ou SP98)
- vitesseMax : la vitesse maximale du véhicule
- une vitesse (zéro par défaut)
- contenanceReservoir : la taille du réservoir
- contenuReservoir : combien de litre de carburant il contient
- le nombre de roues (lié au type de véhicule, toujours le même pour le même type)
Ajouter un construteur (__construct)
Instancier un véhicule de chaque type
*/

abstract class Vehicule
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
    private $vitesse;
    
    /**
     * @var int
     */
    private $contenanceReservoir;
    
    /**
     * @var int
     */
    private $contenuReservoir;
    
    /**
     * @var int
     */
    private $nbRoues;



    public function accelerer(int $acceleration): int
    {
        if($acceleration + $this->getVitesse() <= $this->getVitesseMax())
        {
            $this->vitesse += $acceleration;
        } else {
            trigger_error("La vitesse maximale autorisée est " . $this->getVitesseMax() . " et vous roulez déjà à " . $this->getVitesse(), E_USER_WARNING);
        }     
        
        return $this->vitesse;
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
        if($typeCarburant == "SP95" || $typeCarburant == "SP98")
        {
            $this->typeCarburant = $typeCarburant;
        } else {
            trigger_error("Statut inconnu", E_USER_WARNING);
        }     
        
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
        
        if($vitesse <= $this->getVitesseMax())
        {
            $this->vitesse = $vitesse;
        } else {
            trigger_error("La vitesse maximale autorisée est ". $this->getVitesseMax(), E_USER_WARNING);
        }     
        
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
        if($contenuReservoir <= $this->getContenanceReservoir())
        {
            $this->contenuReservoir = $contenuReservoir;
        } else {
            trigger_error("La contenance maximale autorisée est ". $this->getContenanceReservoir(), E_USER_WARNING);
        }     
        return $this;
    }

    /**
     * Get the value of nbRoues
     *
     * @return  int
     */ 
    public function getNbRoues(): int
    {
        return $this->nbRoues;
    }

}