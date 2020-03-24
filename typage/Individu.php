<?php

class Individu
{
    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string|null
     */
    private $nom;

    /**
     * @var DateTime
     */
    private $dateNaissance;

    /**
     * Get the value of prenom
     *
     * @return  string
     */ 
    public function getPrenom(): string //Le ": string" oblige la méhode à retourner une chaîne de caractères
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @param  string  $prenom
     *
     * @return  self
     */ 
    public function setPrenom(string $prenom): Individu // La méthode retourne un objet instance de Individu. Quand la classe est celle dans laquelle on est, on peut mettre self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of nom
     *
     * @return  string|null
     */ 
    public function getNom(): ?string //Typage valeur de retour => ? veut dire soit ce type soit null
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @param  string|null  $nom
     *
     * @return  self
     */ 
    public function setNom(?string $nom): self //Typage des paramètres => ? veut dire soit ce type soit null
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of dateNaissance
     *
     * @return DateTime
     */ 
    public function getDateNaissance(): ?DateTime
    {
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @param  DateTime  $dateNaissance
     *
     * @return  self
     */ 
    public function setDateNaissance(DateTime $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }


    /**
     * Convertir la date de naissance en string
     *
     * @return string
     */ 
    public function getDateNaissanceAsString(string $defaut = ""): string
    {
        //si l'attribut dateNaissance est un objet 
        if($this->dateNaissance instanceof DateTime) {
            return $this->dateNaissance->format("d/m/Y");
        }

        return $defaut;

    }
}