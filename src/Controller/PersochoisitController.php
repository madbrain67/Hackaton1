<?php

namespace App\Controller;

class PersochoisitController extends AbstractController
{


    public function index10($personnage)
    {   
        $_SESSION["jeux"]->personnage = $personnage;
        $_SESSION["jeux"]->gains = 100;
        
        return $this->twig->render(
            'persochoisit/index.html.twig', [
            ]
        );
    }
    public function index11($personnage)
    {
        $_SESSION["jeux"]->personnage = $personnage;
        $_SESSION["jeux"]->gains = 100;

        return $this->twig->render(
            'persochoisit/index2.html.twig', [
            ]
        );
    }
    public function index8($personnage)
    {
        $_SESSION["jeux"]->personnage = $personnage;
        $_SESSION["jeux"]->gains = 100;

        return $this->twig->render(
            'persochoisit/index3.html.twig', [
            ]
        );
    }

    public function index25($personnage)
    {
        $_SESSION["jeux"]->personnage = $personnage;
        $_SESSION["jeux"]->gains = 100;
        
        return $this->twig->render(
            'persochoisit/index4.html.twig', [
            ]
        );
    }
    public function suite()
    {
        return $this->twig->render(
            'persochoisit/suite.html.twig', [
            ]
        );
    }


}
