<?php

/**
 * link : leetcode level hard :  https://leetcode.com/problems/number-of-digit-one/
 * 
 */
class DigitOne
{

    const ONE = 1;

    /**
     * get the number of digitOne
     *
     * @param integer $number
     * @return integer
     */
    public static function getNumberOfDigitOne(int $number): int
    {
       $aNumbers    = range(0, $number);
       $tmp_results = [];

       foreach ($aNumbers as $key => $valueNumber) {
        // var_dump($valueNumber);
        // die;
        if (is_numeric($valueNumber)) {

            $aOnes = self::countOne(str_split($valueNumber));
            if ($aOnes != 0) {

                $tmp_results[] = $aOnes;
            }
        }
       }

       if (count($tmp_results)>0) {
         $results = array_sum(str_split(implode('',($tmp_results))));
         var_dump($results);
        
       }

       return $results;
    
    }

    /**
     * count all 1 in given parametters
     *
     * @param array $aNumberTocheck
     * @return integer
     */
    public static function countOne(array $aNumberTocheck): int
    {
        $aOnes   = [];
        $allOnes = 0;
      

        foreach ($aNumberTocheck as $key => $number) {
            # code...
            if (is_numeric($number)) {

                if($number == self::ONE) {

                    $aOnes[] = self::ONE;
                }
            }
        }

        if (count($aOnes)>0) {
            $allOnes = (implode('', ($aOnes)));

        
        }

        return $allOnes;

    }
}

DigitOne::getNumberOfDigitOne(13);