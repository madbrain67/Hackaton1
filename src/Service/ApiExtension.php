<?php

namespace App\Service;

class ApiExtension
{
    private $client;

    public function __construct()
    {
        // Create a client with a base URI
        $this->client = new \GuzzleHttp\Client(
            [
            'base_uri' => 'http://easteregg.wildcodeschool.fr/api/',
            ]
        );
    }


    public function oeufs()
    {
        $response = $this->client->request('GET', 'eggs');
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
        //$oeufs = $roulette;

        return $roulette;
        
    }

    public function personnages()
    {
        $response = $this->client->request('GET', 'characters');
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
        return $personnage;
    }
}