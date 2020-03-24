<?php

use App\Cnx;
use App\FlashMessage;
use Model\Abonne;

require_once "App/init.php";

$abonnes = Abonne::findAll();
$abonne = new Abonne();

include "layout/header.php";

//pour avoir une instance unique de PDO
$pdo = Cnx::getInstance();

if(isset($_GET["id"]) && is_numeric($_GET["id"]) && isset($_GET["action"]) && $_GET["action"] == "delete") {

    $id = $_GET["id"];

    if(Abonne::findEmprunt($id)){
        FlashMessage::set("L'abonné ne peut pas être supprimé", "error");
    } else {
        $abonne = Abonne::find($id);
        $abonne->delete();

        FlashMessage::set("L'abonné est supprimé");
    }

    header("Location: abonnes.php");
    die;

}

?>

<h1>Gestion des abonnés</h1>

<a class="btn btn-outline-primary mb-3" href="abonne-edit.php">Ajouter un abonné</a>

<table class="table">
    <tr>
        <th>Id abonné</th>
        <th>Prénom abonné</th>
        <th></th>
        <th></th>
    </tr>
    <?php

    /*foreach ($tab AS $val) {
        echo "<tr>";
        echo "<td>" . $val->id_abonne . "</td>";
        echo "<td>" . $val->prenom . "</td>";
        echo "</tr>";*/

    foreach ($abonnes AS $abonne) {
        echo "<tr>";
        echo "<td>" . $abonne->getId() . "</td>";
        echo "<td>" . $abonne->getPrenom() . "</td>";
        echo "<td>";
        echo "<a class='btn btn-primary' href='abonne-edit.php?id=" . $abonne->getId() ."'>Modifier</a>";
        echo "</td>";
        echo "<td>";
        echo "<a class='btn btn-danger' href='abonnes.php?id=" . $abonne->getId() ."&action=delete'>Supprimer</a>";
        echo "</td>";
        echo "</tr>";

    }
    ?>
</table>

<?php
include "layout/footer.php";
?>
