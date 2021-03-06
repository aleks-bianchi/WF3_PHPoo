<?php
require_once "Vehicules.php";

class Voiture extends Vehicule
{
    public function __construct(string $typeCarburant, int $vitesseMax, int $contenanceReservoir)
    {
        $this
        ->setTypeCarburant($typeCarburant)
        ->setVitesseMax($vitesseMax)
        ->setVitesse(0)
        ->setContenanceReservoir($contenanceReservoir)
        ->setContenuReservoir(0)
        ->setNbRoues(4);
    }

    /**
     * Set the value of nbRoues
     *
     * @param  int  $nbRoues
     *
     * @return  self
     */ 
    private function setNbRoues(int $nbRoues): self
    {
        $this->nbRoues = $nbRoues;

        return $this;
    }
}