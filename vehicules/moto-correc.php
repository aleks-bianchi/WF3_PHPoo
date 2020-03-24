<?php
require_once "vhc-correc.php";

class Mob extends Vhc
{
    const NB_ROUES = 2;

    public function getNbRoues(): int
    {
        return self::NB_ROUES;
    }
    
}