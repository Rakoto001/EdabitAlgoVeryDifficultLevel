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
            array_push($this->maxCoins, $tmp_max_coins);
        } else {
            $tmp_max_coins = $this->makeSupplementaryNumsCoins($inputBalloons); // a compléter
            array_push($this->maxCoins, $tmp_max_coins);
        }

        $aNewInputBalloons = $this->burnstBalloonsOperation($inputBalloons);
     
        if ( count($aNewInputBalloons) > 1 ) {

            return $this->makeBurnstBalloonsMaxCoins($aNewInputBalloons);
        }
        
        var_dump($inputBalloons);
        var_dump($this->maxCoins);

        // var_dump($this->maxCoins);
        // var_dump($this->maxCoins);
        die;

        return $tmp_max_coins;
    }


    /**
     *
     * @param array $inputBalloons
     * @return array
     */
    public function burnstBalloonsOperation(array $inputBalloons) :array
    {
        $aNewInputBalloons = [];

        if (count($inputBalloons) == 1) {

            $aNewInputBalloons = $inputBalloons;
        } else {
            unset($inputBalloons[self::FIRST_INDEX]);
            $aNewInputBalloons = $inputBalloons;
        }


        return $aNewInputBalloons;
    }


    /**
     * If i - 1 or i + 1 goes out of bounds of the array, 
     * then treat it as if there is a balloon with a 1 painted on it
     *
     * @param array $inputBalloons
     * @return array
     */
    public function makeSupplementaryNumsCoins(array $inputBalloons) :array
    {
        $tmp_supplementary_num_coins = [];
        $inputLenth = count($inputBalloons);

        if ($inputLenth == 1) {

            $tmp_supplementary_num_coins[] = self::ADDON_ONE;
            $tmp_supplementary_num_coins[] = current($inputBalloons);
            $tmp_supplementary_num_coins[] = self::ADDON_ONE;

        } elseif ( $inputLenth == 2) {

            $tmp_supplementary_num_coins[] = self::ADDON_ONE;
            $tmp_supplementary_num_coins[] = current($inputBalloons);
            $tmp_supplementary_num_coins[] = $inputBalloons[$inputLenth-1];

        }

        return $tmp_supplementary_num_coins;
    }

    public function getNumsCoins(array $inputBalloons) : array 
    {
        $tmp_num_coins = [];
        $tmp_max_coins[] = $inputBalloons[self::FIRST_INDEX - 1];
        $tmp_max_coins[] = $inputBalloons[self::FIRST_INDEX];
        $tmp_max_coins[] = $inputBalloons[self::FIRST_INDEX + 1];

        return $tmp_max_coins;
        
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