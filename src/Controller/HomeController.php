<?php

namespace App\Controller;

use App\Service\Jeux;

class HomeController extends AbstractController
{

    public function index()
    {


        return $this->twig->render('home/index.html.twig', [

        ]);
    }

    public function jeu()
    {
        $jeux = new Jeux();
        $gain = $jeux->getGains();
        return $this->twig->render('jeu/index.html.twig', [
            'gain' => $gain,
        ]);
    }


}
