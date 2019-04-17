<?php
/**
 *  Class Abstract Controller VS twig.
 */

namespace App\Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;
use App\Config\Jconfig;

abstract class AbstractController
{
    protected $twig;

    public function __construct()
    {

        $className = substr(get_class($this), strlen(get_class($this)), -10);

        // Twig Configuration
        $loader = new Twig_Loader_Filesystem(PATH_ROOT.'/templates/'.strtolower($className));
        $this->twig = new Twig_Environment(
            $loader, array(
            'cache' => false,
            'debug' => true,
            )
        );

        $app = new \stdClass();
        $app->session = $_SESSION;

        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $app->user = $_SESSION['user'];
        }

        if (isset($_SESSION['alert'])) {
            $app->alert = $_SESSION['alert'];
        }

        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
        $this->twig->addGlobal('app', $app);
    }
}
