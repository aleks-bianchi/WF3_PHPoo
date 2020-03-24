<?php

require_once "autoload.php";

$member = new Member();
//appel de la méthode venant du trait
echo $member->asParagraph("Bonjour", "red");

$member->setFirstname("Julien");
$member->displayFirstname("blue");
