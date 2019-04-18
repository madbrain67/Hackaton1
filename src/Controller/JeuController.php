<?php

namespace App\Controller;

use App\Service\Jeux;

class JeuController extends AbstractController
{
    public function index()
    {
        $jeux = new Jeux();
        $gain = $jeux->getGains();
        return $this->twig->render('jeu/index.html.twig', [
            'gain' => $gain,
        ]);
    }
}
