<?php

class SherlockMinMax
{

    private array $accumulationInputDiffRange;

    public function __construct() {
        $this->accumulationInputDiffRange = [];
    }


    /**
     * construct Sherlock Mini value
     *
     * @param array $aSherlockInput
     * @param integer $minRange
     * @param integer $maxRange
     * @return integer
     */
    public function sherlockAndMinimax(array $aSherlockInput, int $minRange, int $maxRange) :int
    {
        $ranges = range($minRange, $maxRange);
        $output = 0;

        $allDifferenceSherlock = $this->makeDifferenceWithInputRange($ranges, $aSherlockInput);
        $aMinSherlockVal = $this->getMinValOfSherlock($allDifferenceSherlock);

        echo ('M values => ' );
        var_dump($aMinSherlockVal);

        $output = array_sum($aMinSherlockVal);
        echo ('final result => ');

        var_dump( $output);
        

        return $output;

    }


    /**
     * get the minval
     *
     * @param array $allDifferenceSherlock
     * @return array
     */
    public function getMinValOfSherlock(array $allDifferenceSherlock) :array
    {
        $sameIndexSherlockValues = [];
        $aMinSherlockVal = [];
        $cartographyLength = count(current($allDifferenceSherlock));

        for ($currentIndex = 0; $currentIndex < $cartographyLength; $currentIndex++) {
            $sameIndexSherlockValues[] = array_column($allDifferenceSherlock, $currentIndex);
        }

        foreach ($sameIndexSherlockValues as $key => $sherlockValue) {
            $aMinSherlockVal[] = (min($sherlockValue));
        }

       
        return $aMinSherlockVal;
        
    }


    /**
     * diff operation to get the min
     *
     * @param array $ranges
     * @param array $aSherlockInput
     * @return array
     */
    public function makeDifferenceWithInputRange(array $ranges, array $aSherlockInput) :array
    {
        $allDifferenceSherlock = [];
       

        foreach ($ranges as $key => $range) {
            $allDifferenceSherlock[] = abs(current($aSherlockInput) - $range);
        }

        array_push($this->accumulationInputDiffRange, $allDifferenceSherlock);

        array_shift($aSherlockInput);

        if ( count($aSherlockInput) > 0) {

            return $this->makeDifferenceWithInputRange($ranges, $aSherlockInput);
        }

        $allDifferenceSherlock =  $this->accumulationInputDiffRange;


        return $allDifferenceSherlock;
    }
}

$sherlock = new SherlockMinMax();
$sherlock->sherlockAndMinimax([5, 8,14], 4, 9);