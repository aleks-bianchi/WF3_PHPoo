<?php

spl_autoload_register( function ($classname) {
    // __DIR__ est une constante magique => le répertoire dans lequel le fichier où est utilisée cette constante se trouve
    //echo __DIR__ . "/" . $classname . ".php";

    //require_once __DIR__ . "/" . $classname . ".php";

    //DIRECTORY_SEPARATOR = le séparateur de répertoire de l'OS que l'on utilise (\ sous Windows, / sous linux et mac)
    //str_replace pour remplacer par le bon séparateur de l'OS dans le nom complet de la classe incluant le namespace
    //echo __DIR__ . DIRECTORY_SEPARATOR . str_replace("\\", DIRECTORY_SEPARATOR, $classname) . ".php";
    require_once __DIR__ . DIRECTORY_SEPARATOR . str_replace("\\", DIRECTORY_SEPARATOR, $classname) . ".php";
});


