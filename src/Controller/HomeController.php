<?php

namespace App\Controller;
use App\Service\Jeux;

class HomeController extends AbstractController
{

    public function index(){

        $jeux = new Jeux();
        $gain = $jeux->getGains();
        return $this->twig->render('home/index.html.twig', [
            'gain' => $gain,
        ]);
    }

    public function dialogue(){


        return $this->twig->render('dialogue/index.html.twig', [

        ]);
    }



}


