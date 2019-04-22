<?php

session_start();
header('Content-Type: text/html');
date_default_timezone_set('Europe/Paris');

require '../vendor/autoload.php';
require '../config/defines.php';

$control = new \App\Service\Jeux();


if(isset($_POST["gains"]) && !empty($_POST["gains"]) 
    && isset($_POST["mise"]) && !empty($_POST["mise"]) 
    && isset($_POST["resultat"]) && !empty($_POST["resultat"]) 
) {
    
    $pieceGagner = $control->slot($_POST["gains"], $_POST["resultat"], $_POST["mise"]);
    $gains = $control->getGains();
    $_SESSION["jeux"]->gains =  $gains;
    //echo $control->slot($_POST["resultat"], $_POST["mise"]);
    echo $pieceGagner.'|'.$gains;

} else {
    echo '';
}



