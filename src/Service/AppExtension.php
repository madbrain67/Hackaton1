<?php

namespace App\Service;

class AppExtension
{
    
    public function app()
    {
        $app = new \stdClass();

        $app->session = $_SESSION;
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $app->user = $_SESSION['user'];
        }

        if (isset($_SESSION['alert'])) {
            $app->alert = $_SESSION['alert'];
        }

        if(!isset($_SESSION["jeux"])) {
            $_SESSION["jeux"] = (object) array();
            //$jeux = new \App\Service\Jeux(100);
            //$this->jeux = $jeux;
        } 

        if (isset($_SESSION['jeux'])) {
            $app->jeu = $_SESSION['jeux'];
        }

        return $app;
    }

}