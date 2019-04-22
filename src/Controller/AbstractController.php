<?php
/**
 *  Class Abstract Controller VS twig.
 */
namespace App\Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;

use App\Service\AppExtension;
use App\Service\ApiExtension;
use App\Service\Jeux;

abstract class AbstractController
{
    protected $twig;
    protected $jeux;

    public function __construct()
    {
        $className = substr(get_class($this), strlen(get_class($this)), -10);
        // Twig Configuration
        $loader = new Twig_Loader_Filesystem(PATH_ROOT.'/templates/'.strtolower($className));
        $this->twig = new Twig_Environment(
            $loader,
            array(
            'cache' => false,
            'debug' => true,
            )
        );
        
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());

        $app = new AppExtension();
        $this->twig->addGlobal('app', $app->app());

        $api = new ApiExtension();
        $this->twig->addGlobal('oeufs', $api->oeufs());
        $this->twig->addGlobal('personnage', $api->personnages());
    }
}
