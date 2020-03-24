<?php


trait StringUtils
{
    public function asParagraph(string $str, string $color = "black"): string
    {
        return "<p style='color:" . $color . "'>" . $str . "</p>";
    }

}