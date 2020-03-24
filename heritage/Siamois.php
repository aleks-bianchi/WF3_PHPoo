<?php
require_once "Chat.php";

final class Siamois extends Chat
{
    //La méthode ne peut pas être surchargée car déclarée finale dans Chat
    // public function ronronner(): void
    // {
    //     echo "Ronronron";
    // }

    public function decrire(): string
    {
        //La couleur n'existe pas dans Siamois car déclarée en private dans Chat => l'héritage ne fonctionne pas, pour l'obtenir il faut passer par le getter (ou setter pour le modifier)
        //return "Un chat de couleur : " . $this->couleur;
        return "Un chat de couleur : " . $this->getCouleur() . " aux yeux " . $this->couleurYeux;
    }
}