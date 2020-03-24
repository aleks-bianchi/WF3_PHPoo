<?php

class Humain
{
    /**
     * 
     * Parce que le paramètre est typé sur la classe chien, je suis sûr de pouvoir appeler la méthode mangerSucre depuis le paramètre
     * 
     * @param Chien $chien
     */
    public function donnerSucre(Chien $chien)
    {
        $chien->mangerSucre();
    }

    /**
     * 
     * $animal doit être un objet instance d'une classe qui hérite d'Animal
     * Comme la méthode crier est définie en méthode abstraite dans Animal, un objet instance d'une classe qui en hérite doit contenir la méthode crier
     * 
     * @param Animal $animal
     */
    public function caresser(Animal $animal)
    {
        return $animal->crier();
    }
}