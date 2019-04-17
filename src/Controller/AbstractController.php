<?php
/**
*  Class Abstract Controller VS twig.
*/
namespace App\Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;

abstract class AbstractController
{
    protected $twig;
    public function __construct()
    {
        // Create a client with a base URI
        $client = new \GuzzleHttp\Client(
            [
           'base_uri' => 'http://easteregg.wildcodeschool.fr/api/',
           ]
       );
        $response = $client->request('GET', 'eggs');
        $body = $response->getBody();
        $u = $body->getContents();
        $zz = json_decode($u);
        $oeufs = array();
        for ($i = 0; $i < count($zz); ++$i) {
            array_push($oeufs, $zz[$i]->image);
        }
        //echo '<pre>'.print_r($oeufs, true).'</pre>';
        $response = $client->request('GET', 'characters');
        $personnage = array();
        $body = $response->getBody();
        $u = $body->getContents();
        $zz = json_decode($u);
        for ($i = 0; $i < count($zz); ++$i) {
            $person = (object) array();
            $person->name = $zz[$i]->name;
            $person->image = $zz[$i]->image;
            array_push($personnage, $person);
        }
        //echo '<pre>'.print_r($personnage, true).'</pre>';
        //echo '<pre>'.print_r(json_decode($u), true).'</pre>';
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
        $this->twig->addGlobal('oeufs', $oeufs);
        $this->twig->addGlobal('personnage', $personnage);
    }
}
