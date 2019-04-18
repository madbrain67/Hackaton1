<?php
namespace App\Controller;

use App\Service\Jeux;

class DialogueController extends AbstractController{
public function index(){


    return $this->twig->render('dialogue/index.html.twig', [
    ]);
}

}