<?php
require_once "Volume.php";

class Sphere implements Volume
{

    /**
     * @inheritDoc => le commentaire de doc se retrouve dans le commentaire de doc de l'interface
     */
    public function getForme(): string
    {
        return "Sphère";
    }

}