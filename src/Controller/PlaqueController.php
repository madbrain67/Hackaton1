<?php
namespace App\Controller;

use App\Service\Jeux;

class PlaqueController extends AbstractController{
    public function index(){


        return $this->twig->render('plaque/index.html.twig', [
        ]);
    }

}