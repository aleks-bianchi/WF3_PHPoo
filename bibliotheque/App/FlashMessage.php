<?php


namespace App;


class FlashMessage
{
    public static function set(string $message, string $type = "success")
    {
        $_SESSION["flash_message"] = [
            "message" => $message,
            "type" => $type
        ];
    }

    public static function display()
    {
        if(isset($_SESSION["flash_message"])){

            $type = $_SESSION["flash_message"]["type"] == "error"
                ? "danger"
                : $_SESSION["flash_message"]["type"]
                ;

            $alert = "<div class='alert alert-" . $type . "'>"
                . $_SESSION["flash_message"]["message"]
                . "</div>";
            echo $alert;

            //Suppression du message pour affichage unique
            unset($_SESSION["flash_message"]);
        }
    }
}