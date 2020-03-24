<?php

class Article
{
    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $auteur;

    /**
     * @var DateTime
     */
    private $datePublication; // pas possible d'instancier un objet directement dans un attribut donc on peut pas donner une valeur par défaut sur ce type de variable, on le fait donc dans le constructeur

    /**
     * Constructeur de la classe
     * Cette méthode, si elle est présente, est appelée automatiquement à l'instanciation de la classe
     * 
     * Le paramètre $titre est obligatoire car il n'a pas de valeur par défaut, donc il faut lui donner une valeur
     * Le $auteur est facultatif car il a une valeur par défaut
     * 
     */
    public function __construct(string $titre, ?string $auteur = null)
    {
        $this
            ->setTitre($titre)
            ->setAuteur($auteur)
            ->setDatePublication(new DateTime()) //Pour affecter une valeur par défaut à un attribut qui contient un objet. Ici c'est la date "maintenant"
        ;
    }

    /**
     * Méthode magique appelée automatiquement quand on utilise un objet comme une chaîne de caractère, par exemple quand on fait un echo de l'objet
     * 
     */
    public function __toString()
    {
        return $this->titre;
    }

    /**
     * Get the value of titre
     *
     * @return  string
     */ 
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @param  string  $titre
     *
     * @return  self
     */ 
    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of auteur
     *
     * @return  string
     */ 
    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    /**
     * Set the value of auteur
     *
     * @param  string  $auteur
     *
     * @return  self
     */ 
    public function setAuteur(?string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get the value of datePublication
     *
     * @return  DateTime
     */ 
    public function getDatePublication(): DateTime
    {
        return $this->datePublication;
    }

    /**
     * Set the value of datePublication
     *
     * @param  DateTime  $datePublication
     *
     * @return  self
     */ 
    public function setDatePublication(DateTime $datePublication): self
    {
        $this->datePublication = $datePublication;

        return $this;
    }
}