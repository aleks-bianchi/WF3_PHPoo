<?php

require_once "Animal.php";
require_once "Chat.php";
require_once "Chien.php";
require_once "Humain.php";
require_once "MaitreChien.php";
require_once "Maitre.php";
require_once "Siamois.php";
//La classe SiamoisAngora ne doit pas exister car elle hérite d'une classe final
//require_once "SiamoisAngora.php";

//On la passe en commentaire suite au passag en classe abstraite
// $animal = new Animal();
// echo $animal->identifier();

$chien = new Chien();
$chat = new Chat();

echo "<br>" . $chien->identifier();
echo "<br>" . $chat->identifier();

//Parce que Chat et Chien héritent d'Animal, elles implémentent forcément la méthode crier
echo "<br>" . $chien->crier();
echo "<br>" . $chat->crier();


$humain = new Humain();
echo "<br>";
$humain->donnerSucre($chien);

//Erreur à cause du typage du paramètre
//$humain->donnerSucre($chat);


echo "<br>";
echo $humain->caresser($chien);
echo "<br>";
echo $humain->caresser($chat);

var_dump($chat instanceof Chat); //true
var_dump($chat instanceof Animal); //true


$milou = new Chien();
$tintin = new MaitreChien($milou);

//Pour faire aboyer Milou
echo $tintin->getChien()->crier();
//ou
echo "<br>" . $tintin->caresserChien();



$garfield = new Chat();
$jon = new Maitre($garfield);


$zeus = new Chien();
$higgins = new Maitre($zeus);

echo "<br>" . $jon->caresserAnimal();
echo "<br>" . $higgins->caresserAnimal();


$siamois = new Siamois();
var_dump($siamois instanceof Siamois); //true
//Par héritage:
var_dump($siamois instanceof Chat); //true
var_dump($siamois instanceof Animal); //true

echo $siamois->decrire();