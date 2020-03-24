<?php


class Member
{
    //Dans une classe, le use sert à intégrer un ou plusieurs (séparés par des virgules) trait
    //Le contenu de StringUtils est donc maintenant disponible dans la classe Membre
    //En général on y met des utilitaires / des boîtes à outils qu'on peut réutiliser dans plusieurs classes sans avoir la contrainte de l'héritage
    use StringUtils;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return Member
     */
    public function setFirstname(string $firstname): Member
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function displayFirstname($color = "black")
    {
        echo $this->asParagraph($this->firstname, $color);
    }
}