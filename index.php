<?php

/********************************************/
/************* Objet via classe *************/
/********************************************/

class Utilisateur
{
    //commentaire de documentation qui n'est pas interprété en tant que code mais peut être lu par des outils comme des générateurs automatiques de documentation 
    /**
     * 
     * Attribut (ou propriété) de la classe (=variable interne)
     * 
     * un tag pour préciser le type de la variable et éventueelement sa description
     * @var string le prénom de l'utilisateur
     */

    //déclarer les attributs comme des variables en indiquant leur visibilité (privée ou publique)
    public $prenom = "Julien";

 
    /**
     * 
     * Attribut sans valeur par défaut (=null)
     * 
     * @var string|null
     */
    public $nom;


    /**
     * 
     * Un attribut privé => pas accessible d'y accéder directement, si on veut pouvoir y accéder il faut utiliser une méthode (cf plus bas)
     * 
     * @var int
     */
    private $age = 20;


    /**
     * Une méthode = une fonction interne à la classe
     * 
     * @return string
     */
    public function nomComplet()
    {
        //$this dans une méthode fait référence à l'objet qui appelle la méthode
        return rtrim($this->prenom . " " . $this->nom);
    }

    /**
     * 
     * @return string
     */
    public function infos()
    {
        return $this->nomComplet() . ', ' . $this->age . " ans";
    }


    //Ecrire une méthode qui fait vieillir l'utilisateur d'un an
    public function getOld()
    {
        $this->age++;
    }

}

//Instanciation de la classe = création d'un objet à partir de la classe :
$moi = new Utilisateur(); //parenthèses pas obligatoire mais mises par convention

//La flèche pour accéder à l'attribut de l'objet
echo $moi->prenom;

$toi = new Utilisateur();

$toi->prenom = "Thomas"; //modification de la valeur de la propriété prenom pour l'instance $toi

echo "<br>" . $moi->prenom . "<br>"; //Julien
echo "<br>" . $toi->prenom . "<br>"; //Thomas

var_dump($moi->nom);

$toi->nom = "Dupont";

//appel de la méthode nomComplet
echo $toi->nomComplet();

echo "<br>" . $toi->infos();
$toi->getOld();
echo "<br>" . $toi->infos();

var_dump($toi);

//IL est possible de rajouter des attributs à la volée mais ce n'est pas recommandé, il est préférable de les créer dans la classe
$toi->adresse = "2 rue des Bois";

var_dump($toi);


/********************************************/
/************* Objet à la volée *************/
/********************************************/

$array = ["pseudo" => "Ben", "email" => "ben@mail.fr"];

//conversion du tableau en objet
//L'objet appartient à la classe de base de PHP : stdClass
$obj = (object)$array;

var_dump($obj);

//Création d'un objet à la volée
$lui = new stdClass();
$lui->nomComplet = "Julien Anest";

var_dump($lui);


echo get_class($toi);

//Test modification pour git sdlkjksdjkldsflkjlkjdflkjsldfjljfdljjlkjdsflkjlsdfjk
//dslfkhksjhdfkjsdhf
echo get_class($moi);