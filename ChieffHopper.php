<?php

/** link =>         https://www.hackerrank.com/challenges/chief-hopper/problem?isFullScreen=true */





class ChieffHopper
{
    private array $botEnergy;
    private array $deltas;
    private int $bot;
    private int $delta;
    public function __construct() {
        $this->botEnergy = [];
        $this->deltas = [];
    }

    /**
     * determine the minimum energy his bot needs at the start 
     * so that he can jump to the top of each building without 
     * his energy going below zero.
     *
     * @param array $inputArray
     * @param [type] $bEnergy
     * @return void
     */
    public function chiefHopper(array $inputArray, $bEnergy)
    {
        $tmp_new_energy = [];
        $this->bot = $bEnergy;

        if (is_array($inputArray)) {
            foreach ($inputArray as $key => $height) {
               $tmp_new_energy[] = $this->makeBotEnergies($height, $this->bot);
            }
        }

        if ( $this->checkIsAllPositiveDeltas($tmp_new_energy)) {
           $bEnergy = $bEnergy+1;
        }  else {
           $bEnergy = $bEnergy-1;

        return $this->chiefHopper($inputArray, $bEnergy);
        }

        echo'all botEnergy: ';
        var_dump($tmp_new_energy);
        echo'Delta: ';
        var_dump($this->deltas);
        echo'The minimum starting botEnergy : ';
        var_dump($bEnergy);
        die;

        return $bEnergy;
    }


    /**
     * check all content of botEnergies
     *
     * @param array $botEnergies
     * @return boolean
     */
    public function checkIsAllPositiveDeltas(array $botEnergies) :bool
    {
       $negativeValues =  array_filter($botEnergies, fn($energie) =>  $energie < 0 );

       if (count($negativeValues)) {

        return true;
       }

       return false;
    }


    /**
     * calculate all bEnergy and delta
     *
     * @param integer $height
     * @param integer $bEnergy
     * @return integer
     */
    public function makeBotEnergies(int $height, int $bEnergy) :int
    {
        $tmp_new_energy = 0;
        $delta = 0;

        if ($bEnergy < $height) {
            $delta = $height - $bEnergy;
            $tmp_new_energy = $bEnergy - $delta;

        } elseif ($bEnergy > $height) {
            $delta = ($bEnergy - $height);
            $tmp_new_energy = $bEnergy + $delta;
        }
        
        $this->bot = $tmp_new_energy;
        array_push($this->deltas, $delta);

        return $this->bot;
    }
}

$ochieff = new ChieffHopper();
// $ochieff->chiefHopper([3, 4, 3, 2, 4]); //3 4 3 2 4
$ochieff->chiefHopper([2,3,4,3,2], 4); //3 4 3 2 4