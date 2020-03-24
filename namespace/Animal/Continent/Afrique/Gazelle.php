<?php


namespace Animal\Continent\Afrique;


class Gazelle
{
    public function voirElephant()
    {
        /**
         * Animal\Continent\Afrique\Elephant
         * car sans utiliser le nom complet de la classe et sans use, la classe est celle qui se trouve dans le namespace dans lequel on est
         */
        $elephant = new Elephant();
        echo "Je vois un éléphant avec de " . $elephant->getTailleOreilles() . " oreilles";
    }

    public function etreVue()
    {
        $touriste = new \Touriste(); //Le \ permet de revenir à la racine des namespace car cette classe n'a pas de namespace
        $touriste->voirGazelle();
    }
}