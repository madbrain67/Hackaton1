<?php

namespace App\Controller;

use App\Service\Jeux;

class JeuController extends AbstractController
{
    public function index()
    {
        
        $jeux = new Jeux();
        $gain = $jeux->getGains();
        $jeux->setPersonnage($_SESSION["jeux"]->personnage);
        $pers = $jeux->getPersonnage();


        //echo '<pre>'.print_r($_SESSION["jeux"], true).'</pre>';


        return $this->twig->render(
            'jeu/index.html.twig', [
            'gain' => $gain,
            'personne' => $pers,
            ]
        );

    }
}
