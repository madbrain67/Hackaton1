<?php

namespace App\Controller;

use App\Service\Jeux;

class PersochoisitController extends AbstractController
{
    public function index10()
    {
        return $this->twig->render('persochoisit/index.html.twig', [
        ]);
    }
    public function index11()
    {
        return $this->twig->render('persochoisit/index2.html.twig', [
        ]);
    }
    public function index8()
    {
        return $this->twig->render('persochoisit/index3.html.twig', [
        ]);
    }

    public function index25()
    {
        return $this->twig->render('persochoisit/index4.html.twig', [
        ]);
    }
    public function suite()
    {
        return $this->twig->render('persochoisit/suite.html.twig', [
        ]);
    }


}