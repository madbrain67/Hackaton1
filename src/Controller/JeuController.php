<?php

namespace App\Controller;

use App\Service\Jeux;

class JeuController extends AbstractController
{
    public function index()
    {
        
        $jeux = new Jeux($_SESSION["jeux"]->personnage, $_SESSION["jeux"]->gains);
        $gains = $jeux->getGains();
        $personnage = $jeux->getPersonnage();
        //echo '<pre>'.print_r($personnage, true).'</pre>';

        return $this->twig->render(
            'jeu/index.html.twig', [
            'gain' => intval($gains),
            'personne' => $personnage,
            ]
        );

    }
}
