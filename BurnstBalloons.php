<?php

/** link => https://leetcode.com/problems/burst-balloons/ */


class BurnstBalloons
{
    const FIRST_INDEX = 1;
    const ADDON_ONE = 1;

    private array $maxCoins;

    public function __construct() {
        $this->maxCoins = [];
    }

    public function makeBurnstBalloonsMaxCoins(array $inputBalloons) :array
    {
        $tmp_max_coins = [];

        if ( $this->checIndexCoins($inputBalloons) ){
            $tmp_max_coins = $this->getNumsCoins($inputBalloons);

        }
        

        return $tmp_max_coins;
    }

    public function getNumsCoins(array $inputBalloons) : array 
    {
        $tmp_num_coins = [];
        $tmp_max_coins[] = $inputBalloons[self::FIRST_INDEX - 1];
        $tmp_max_coins[] = $inputBalloons[self::FIRST_INDEX];
        $tmp_max_coins[] = $inputBalloons[self::FIRST_INDEX + 1];

        return $tmp_num_coins;
        
    }


    public function checIndexCoins(array $inputBalloons) :bool
    {

        if ( count($inputBalloons) <= 2 ) {

            return false;
        }

        return true;
        
    }
}



$ball = new BurnstBalloons();
$ball->makeBurnstBalloonsMaxCoins([3,1,5,8]);