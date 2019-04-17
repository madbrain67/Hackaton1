<?php
/**
 * Created by PhpStorm.
 * User: stephaneaugustin
 * Date: 2019-04-17
 * Time: 17:38
 */

namespace App\Service;


class Jeux
{

    private $score;
    private $gains;
    private $findejeux;

    public function __construct()
    {
        $this->score = 0;
        $this->gains = 100;
    }

    public function getGains()
    {

        return $this->gains;
    }
    public function setGains($score)
    {
        if($this->getGains()>0)
        {
            if($score>0)
            {
                $this->gains += $score;
            }
            else{
                $this->gains += $score;
            }
        }
        else{

             $this->gains = 0;
            }


    }
    public function setScore($score)
    {
        $this->score += $score;
    }
    public function getScore()
    {
        return $this->score;
    }
}