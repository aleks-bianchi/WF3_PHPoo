<?php
require_once "Vehicules.php";
require_once "Voiture.php";
require_once "Moto.php";


require_once "voiture-correc.php";
require_once "moto-correc.php";

require_once "Pompe.php";

// $lambo = new Voiture("SP95", 320, 90);
// var_dump($lambo);
// $lambo->setVitesse(150);
// var_dump($lambo);
// $lambo->accelerer(150);
// var_dump($lambo);
// $lambo->accelerer(150);
// var_dump($lambo);


// $kawa = new Moto("SP98", 200, 40);
// var_dump($kawa);


$voiture = new Voit("SP95", 180, 80, 50);
$moto = new Mob("SP98", 200, 30, 15);

//Fatal error : carburant non accepté
$voiture2 = new Voiture("Diesel", 180, 80, 50);

var_dump($voiture);
var_dump($moto);

echo $moto->getNbRoues();

echo "<br>" . $voiture->getVitesse() . " km/h";
$voiture->accelerer(50);


$pompe1 = new Pompe("SP98", 1000, 600);
var_dump($pompe1);
var_dump($voiture);

$voiture->fairePlein($pompe1);
var_dump($voiture, $pompe1);
