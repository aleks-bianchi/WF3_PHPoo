<?php


namespace Animal;

//Alias pour un namespace et non pour une classe
use Animal\Continent as Monde;

class Fourmi
{
    public function voirElephantAfrique()
    {
        //Sachant qu'on est dans le namespace Animal, on n'a pas besoin de répéter tout le chemin
        // on peut utiliser la classe relativement au namespace dans lequel on se troueb
        $elephantAfrique = new Continent\Afrique\Elephant();

        echo "Je vois un éléphant avec de " . $elephantAfrique->getTailleOreilles() . " oreilles";
    }

    public function voirElephant(string $continent)
    {
        if($continent == "afrique"){
            $elephant = new Monde\Afrique\Elephant();
        } elseif ($continent == "asie") {
            $elephant = new Monde\Asie\Elephant();
        }

        if(isset($elephant)) {
            echo "Je vois un éléphant avec de " . $elephant->getTailleOreilles() . " oreilles";
        } else {
            echo "Il n'y a pas d'éléphant où je me trouve";
        }
    }
}