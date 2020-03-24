<?php


namespace Animal\Continent\Afrique;

use \Animal\Elephant as ElephantInterface;


class Elephant implements ElephantInterface
{

    /**
     * @return string
     */
    public function getTailleOreilles(): string
    {
        return "grandes";
    }
}