<?php
require_once "Cube.php";
require_once "Sphere.php";
require_once "Brique.php";
require_once "De.php";

function getFormeVolume(Volume $volume) {
    echo "La forme du volume est : " . $volume->getForme();
}

function getCouleurTexture(Texture $texture){
    echo "La couleur de la texture est : " . $texture->getCouleur();
}

$cube = new Cube();

getFormeVolume($cube);

var_dump($cube instanceof Cube); //true
var_dump($cube instanceof Volume); //true


$sphere = new Sphere();
getFormeVolume($sphere);

$brique = new Brique();
echo "<br>";
getFormeVolume($brique);
echo "<br>";
getCouleurTexture($brique);

$de = new De("plastique", "rouge");

var_dump($de);
echo "<br>";
getFormeVolume($de);
echo "<br>";
getCouleurTexture($de);
