<?php

require_once "Individu.php";

$jean = new Individu();

//fatal error : le paramètre attendu par setPrenom est typé string
//$jean->setPrenom(["prenom" => "Jean"]);

//Pas d'erreur ici, l'entier 1234 est converti en string
$jean->setPrenom(1234);

$prenom = null;
//erreur, le paramètre attendu par setPrenom ne peut être null
//$jean->setPrenom($prenom)

var_dump($jean->getDateNaissance()); //null

//erreur : le paramètre attendu par setDateNaissance doit être un objet instance de DateTime
//$jean->setDateNaissance("2002-02-05");

$dateNaissance = new DateTime("2002-02-05");
$jean->setDateNaissance($dateNaissance);

//erreur : un objet DateTime ne peut-être converti en string
//echo $jean->getDateNaissance();
//Méthode format() de la classe DateTime pour l'affichage de la date
echo $jean->getDateNaissance()->format("d/m/Y");


$rene = new Individu();
//erreur : l'attribut
//echo $rene->getDateNaissance()->format("d/m/Y");

var_dump($rene->getDateNaissanceAsString());
var_dump($rene->getDateNaissanceAsString("inconnue"));