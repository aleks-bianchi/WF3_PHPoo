<?php

require_once "Personne.php";

$pierre = new Personne();

$pierre->setPrenom("Pierre");

//Fatal Error : l'attribut est privé
//$pierre->prenom = "Pierre"


//On passe par le getter pour accéder à la valeur de l'attribut
echo $pierre->getPrenom();

$pierre->setPrenom("1234"); //warning

echo "<br>" . $pierre->getPrenom();



$paul = new Personne();

//Appel chaîné aux setters: possible grâce aux return $this dans les setters
//= interface fluide (fluent setters en anglais)
$paul
    ->setPrenom("Paul")
    ->setNom("Bismuth")
;