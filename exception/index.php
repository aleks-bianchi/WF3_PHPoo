<?php
require_once "autoload.php";

//try {} catch {} pour attraper une exception jetée et afficher un message personnalisé qu'on va pouvoir mettre en forme
try {
    //pour jeter une exception
    throw new Exception("Une erreur est survenue");

    //le code dans le bloc try après le throw n'est pas exécuté si l'exception a bien été jetée
    echo "ici";

} catch (Exception $e) {
    //retourne le message passé à l'instanciation de l'exception
    echo $e->getMessage();
}

echo "<br>";

try {

    $user = new User();
    $user->setFirstname("123");

} catch (Exception $e) {
    echo "Une erreur est survenue";
    Logger::log($e);
}

echo "<br>";

try {

    $user = new User();
    $user->setLastname("123");

} catch (InvalidArgumentException $e) {
    echo "Une erreur d'argument est survenue";
    Logger::log($e);
} // on peut enchaîner plusieurs catch mais on va toujours du plus précis au moins précis en remontant l'arbre d'héritage des classes de type Exception

echo "<br>";

try {

    $user = new User();
    $user->setBirthDate("2000-01-01");

} catch (Throwable $e) {
    echo "Une erreur est survenue";
    Logger::log($e);
}