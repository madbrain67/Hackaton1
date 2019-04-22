<?php


namespace App\Service;

class Jeux
{

    private $gains;
    private $personnage;


    public function __construct($personnage = null, $gains = null)
    {
        if($personnage !== null && $gains !== null) {
            $this->gains = $gains;
            $this->personnage = $personnage;
        }
    }

    /**
     * SET ET GET GAINS
     */
    private function setGains($gains)
    {
        $this->gains = $gains;
    }

    public function getGains()
    {
        return $this->gains;
    }



    /**
     * SET ET GET PERSONNAGE
     */
    private function setPersonnage($personnage)
    {
        $this->personnage = $personnage;
    }


    public function getPersonnage()
    {
        return $this->personnage;
    }


    /**
     *  SLOT
     */
    public function slot(int $gains, array $tab, int $mise) : int
    {
        $multiplicateurGains = $mise / 2; 
        $prize = 0;
        $result = array_count_values($tab);
        foreach($result as $key => $value)
        {
            switch ($value)
            {
            case 2:
                $prize += ($multiplicateurGains / 2);
                break;
            case 3 :
                $prize += ($multiplicateurGains * 10);
                break;
            case 4 :
                $prize += ($multiplicateurGains * 30);
                break;
            case 5 :
                $prize += ($multiplicateurGains * 50);
                break;
            case 6 :
                $prize += ($multiplicateurGains * 100);
                break;
            default: 
                $prize += 0;
                break;
            }
         
        }  
        $prize = round($prize);

        if ($prize < ($multiplicateurGains)) { 
            $prize = 0;
        }
        
        $this->setGains($gains);
        $NewGains = $this->getGains() + $prize;
        $this->setGains($NewGains);
        return $prize;
        
    }
}
