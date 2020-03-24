<?php

require_once "Animal.php";

//La classe Chat hérite d'Animal

class Chat extends Animal
{
    /**
     * @var string
     */
    private $couleur = "noir";

    /**
     * @var string
     */
    protected $couleurYeux = "bleus"; //un attribut protégé n'est pas accessible depuis un objet, il faut passer par les getters/setters. Depuis une classe fille par contre il est accessible comme s'il avait été déclaré dans la classe fille directement

    /**
     * Surcharge (=redéfinition) de la méthode identifier définie dans Animal
     */
    public function identifier(): string
    {
      return parent::identifier() . " et je suis un chat";  
    }

    /**
     * Implémentation de la méthode abstraite crier définie dans Animal = sa définition concrète
     */
    public function crier(): string
    {
        return "Miaou";
    }

    //final pour empêcher de surcharger une méthode dans les classes enfant
    final public function ronronner(): void //=null, la méthode affiches qqch mais ne retourne rien
    {
        echo "Ronron";
    }

    /**
     * Get the value of couleur
     *
     * @return  string
     */ 
    public function getCouleur(): string
    {
        return $this->couleur;
    }

    /**
     * Set the value of couleur
     *
     * @param  string  $couleur
     *
     * @return  self
     */ 
    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get the value of couleurYeux
     *
     * @return  string
     */ 
    public function getCouleurYeux(): string
    {
        return $this->couleurYeux;
    }

    /**
     * Set the value of couleurYeux
     *
     * @param  string  $couleurYeux
     *
     * @return  self
     */ 
    public function setCouleurYeux(string $couleurYeux): self
    {
        $this->couleurYeux = $couleurYeux;

        return $this;
    }
}