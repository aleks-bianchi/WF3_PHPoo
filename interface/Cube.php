<?php
require_once "Volume.php";

class Cube implements Volume
{

    /**
     * @inheritDoc
     */
    public function getForme(): string
    {
        return  "cube";
    }
}