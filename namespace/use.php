<?php

use Database\Adapter\Postgresql;
use Database\Cnx;
//Si on veut utiliser l'autre classe qui a le nom court Cnx on utilise un alias
use Smtp\Cnx as MailCnx;

require_once "Database/Cnx.php";
require_once "Smtp/Cnx.php";
require_once "Database/Adapter/Postgresql.php";

//instanciation de Database/Cnx
$dbCnx = new Cnx();

$pgAdapter = new Postgresql();

//instanciation de Smtp/Cnx
$mailCnx = new MailCnx();
