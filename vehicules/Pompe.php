<?php

/*
Créer une classe Pompe (à essence) avec 3 attributs :
typeCarburant, contenance & contenu (de la cuve)
Dans Vehicule, ajouter une méthode fairePlein() qui prend une Pompe
en paramètre, qui remplit le réservoir du Vehicule et enlève autant
d'essence à la pompe

Bonus:
- gérer le cas où l'on ne va pas à une pompe du même type de carburant
que le véhicule : afficher un message et ne pas faire le plein
- gérer le cas où la pompe ne contient pas assez d'essence
 pour faire le plein : dans ce cas, vider la pompe

Tester tous les cas dans l'index
*/


class Pompe
{
    /**
     * @var string
     */
    private $typeCarburant;

    /**
     * @var int
     */
    private $contenancePompe;

    /**
     * @var int
     */
    private $contenuPompe = 0;


    private static $carburantsAcceptes = [
        "SP95",
        "SP98"
    ];


    public function __construct(
        string $typeCarburant,
        int $contenancePompe,
        int $contenuPompe
    )
    {
        $this
            ->setTypeCarburant($typeCarburant)
            ->setContenancePompe($contenancePompe)
            ->setContenuPompe($contenuPompe);       
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
     * Get the value of contenancePompe
     *
     * @return  int
     */ 
    public function getContenancePompe(): int
    {
        return $this->contenancePompe;
    }

    /**
     * Set the value of contenancePompe
     *
     * @param  int  $contenancePompe
     *
     * @return  self
     */ 
    public function setContenancePompe(int $contenancePompe): self
    {
        $this->contenancePompe = $contenancePompe;

        return $this;
    }

    /**
     * Get the value of contenuPompe
     *
     * @return  int
     */ 
    public function getContenuPompe(): int
    {
        return $this->contenuPompe;
    }

    /**
     * Set the value of contenuPompe
     *
     * @param  int  $contenuPompe
     *
     * @return  self
     */ 
    public function setContenuPompe(int $contenuPompe): self
    {
        
        if($contenuPompe > $this->contenancePompe)
        {
            $contenuPompe = $this->contenuPompe;
        }     

        $this->contenuPompe = $contenuPompe;

        return $this;
    }
}