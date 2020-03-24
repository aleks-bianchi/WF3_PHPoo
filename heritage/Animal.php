<?php

abstract class Animal // la déclarer abstraite empêche qu'on l'instancie en objet, elle ne sert alors qu'à être héritée.
{
    /**
     * 
     */
    public function identifier(): string
    {
        return "Je suis un animal";
    }

    abstract public function crier(): string; //Méthode abstraite => obliger les classes filles à avoir cette méthode et ayant du contenu même si celle ici n'en a pas. Une méthode non abstraite est obligée d'avoir du contenu
}