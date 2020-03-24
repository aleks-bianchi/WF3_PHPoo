<?php

use App\FlashMessage;
use Model\Abonne;

require_once "App/init.php";

$errors = [];

/*
 * Adapter la page pour la faire fonctionner en modif quand on reçoit un id get:
 * - ajouter une méthode statique find() à la classe Abonne qui prend un id en paramètre et sui retourne un objet Abonne à partir d'une requête SQL
 * - modifier la méthode save() pour qu'elle fasse un update si l'abonné a un id
 */

$abonne = new Abonne();

/*if(isset($_GET["id"]) && is_numeric($_GET["id"])) {

    $id = $_GET["id"];
    $abonne = Abonne::find($id);

}*/

if(isset($_GET["id"])) {
    $abonne = Abonne::find($_GET["id"]);
} else {
    $abonne = new Abonne();
}

if(!empty($_POST)){
    $abonne->setPrenom($_POST["prenom"]);

    if($abonne->validate($errors)){
        $abonne->save();

        FlashMessage::set("L'abonné est enregistré");

        header("Location: abonnes.php");
        die; //pour arrêter l'exécution du code car on n'en a pas besoin étant donné qu'on fait une redirection
    }
}


include "layout/header.php";
?>

<h1>Edition Abonné</h1>

<?php
if(!empty($errors)):
    ?>

<div class="alert alert-danger">
    <strong>Le formulaire contient des erreurs</strong><br>
    <?= implode ("<br>", $errors) ?>
</div>

<?php
endif;
?>

<form method="post">
    <div class="form-group">
        <label>Prénom</label>
        <input type="text" name="prenom" class="form-control" value="<?= $abonne->getPrenom() ?>">
    </div>
    <div class="text-right">
        <button class="btn btn-primary" type="submit">Enregistrer</button>
        <a href="abonnes.php" class="btn btn-secondary">Retour</a>
    </div>
</form>


<?php
include "layout/footer.php";
?>


