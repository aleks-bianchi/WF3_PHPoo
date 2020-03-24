<?php


class Logger
{
    public static function log(Throwable $e)//Throwable représente à la fois Exception et Error
    {
        //Fonction qui ouvre/crée un fichier et écrit dedans
        file_put_contents(
          "log.txt",
          "[" . date("Y-m-d H:i:s") . "] "
          //fichier dans lequel l'exception a été jetée
            . $e->getFile()
            //la ligne dans le fichier
            . " line " . $e->getLine()
            //le message déclaré à l'instanciation de l'exception
            . " " . $e->getMessage()
            //Saut de ligne en fonction de l'OS sur lequel on se trouve
            //la trace des actions = ce qui s'est passé dans le code pour parvenir à l'exception
            . PHP_EOL . $e->getTraceAsString() . PHP_EOL,
          FILE_APPEND //Pour écrire à la fin du fichier plutôt qu'écraser le contenu
        );
    }
}