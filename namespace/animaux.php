<?php
require_once "autoload.php";

use Animal\Continent\Asie\Elephant as ElephantAfrique;
use Animal\Continent\Asie\Elephant as ElephantAsie;
use Animal\Continent\Afrique\Gazelle as Gazelle;
use Animal\Fourmi;

$elephantAfrique = new ElephantAfrique();

$elephantAsie = new ElephantAsie();

$gazelle = new Gazelle();

$gazelle->voirElephant();

$gazelle->etreVue();

$fourmi = new Fourmi();
echo "<br>";
$fourmi->voirElephantAfrique();

echo "<br>";
$fourmi->voirElephant("afrique");

echo "<br>";
$fourmi->voirElephant("asie");

echo "<br>";
$fourmi->voirElephant("europe");


echo "<br>";
// ::class est utilisable sur toutes les classes et retourne le nom complet de la classe sous forme de chaîne de caractères
echo Gazelle::class;