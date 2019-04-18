<?php
/**
 *  Class Abstract Controller VS twig.
 */
namespace App\Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;
use App\Service\Jeux;

abstract class AbstractController
{
    protected $twig;
    protected $jeux;

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

        
        for($n=0;$n<count($oeufs);$n++)
        {
             //echo 'numero '.$n.' <img src="'.$oeufs[$n].'" width="100"> ';
            if($n == 0) { $roulette[] = $oeufs[$n];
            }
            if($n == 1) { $roulette[] = $oeufs[$n];
            }
            if($n == 3) { $roulette[] = $oeufs[$n];
            }
            if($n == 5) { $roulette[] = $oeufs[$n];
            }
            if($n == 8) { $roulette[] = $oeufs[$n];
            }
            if($n == 9) { $roulette[] = $oeufs[$n];
            }
            if($n == 25) { $roulette[] = $oeufs[$n];
            }
            if($n == 29) { $roulette[] = $oeufs[$n];
            }
            if($n == 36) { $roulette[] = $oeufs[$n];
            }
            if($n == 37) { $roulette[] = $oeufs[$n];
            }
            
            //unset($oeufs[3]);
        }


        //echo '<pre>'.print_r($roulette, true).'</pre>';

        $oeufs = $roulette;



        $response = $client->request('GET', 'characters');
        $personnage = array();
        $body = $response->getBody();
        $u = $body->getContents();
        $zz = json_decode($u);
        for ($i = 0; $i < count($zz); ++$i) {
            $person = (object) array();
            $person->id = $zz[$i]->id;
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

       


        if(!isset($_SESSION["jeux"])) {
            $_SESSION["jeux"] = (object) array();
            //$jeux = new Jeux(100);
            //$this->jeux = $jeux;
        } 

        if (isset($_SESSION['jeux'])) {
            $app->jeu = $_SESSION['jeux'];
        }


        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
        $this->twig->addGlobal('app', $app);
        $this->twig->addGlobal('oeufs', $oeufs);
        $this->twig->addGlobal('personnage', $personnage);
    }
}
