<?php
namespace App\Controller;

use App\Service\Jeux;

class ReponseController extends AbstractController{
    public function oui(){


        return $this->twig->render('reponse/oui.html.twig', [
        ]);
    }
    public function non(){


        return $this->twig->render('reponse/non.html.twig', [
        ]);
    }

}