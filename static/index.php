<?php

require_once "Config.php";
require_once "Commande.php";

//on accède à la constante de classe avec l'opérateur de résolution de portée ::
echo Config::RACINE_WEB;

echo "<br>" . Config::getPath("produit.php");

//Fatal error, l'attrobut est privé
//echo Commande::$nbCOmmandes;
echo "<br>" . Commande::getNbCommandes(); //0
$commande = new Commande();
echo "<br>" . Commande::getNbCommandes(); //1
$commande2 = new Commande();
echo "<br>" . Commande::getNbCommandes(); //2

//Erreur car statut n'existe pas dans la liste
//$commande->setStatus("délivrée");


//Exo: faire une liste déroulant à partir de l'attribut statique acceptedStatuses de Commande
?>

<hr>
<form method="POST" action="">
<label for="statut">Statuts</label>
<select id="statut" name="statut">
<?php

    foreach(Commande::$acceptedStatuses AS $indice => $valeur){
        echo "<option value='" . $indice . "'>" . $valeur . "</option>";
    }

?>
</select> 
</form>

<p>Autre notation possible</p>

<select name="status">
<?php
foreach(Commande::$acceptedStatuses as $valeur) :
?>
    <option value="<?= $valeur ?>"><?= $valeur ?></option>
<?php
endforeach;
?>
</select>