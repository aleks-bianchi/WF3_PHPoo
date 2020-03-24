<?php
require_once "vhc-correc.php";

class Voit extends Vhc
{
    const NB_ROUES = 4;
    
    public function getNbRoues():int
    {
        return self::NB_ROUES;
    }
}