<?php

// link :  https://leetcode.com/problems/number-of-ways-to-separate-numbers/


/** description */
/**
 * You wrote down many positive integers in a string called num.
 *  However, you realized that you forgot to add commas to seperate the different numbers. 
 * You remember that the list of integers was non-decreasing and that no integer had leading zeros.
 * Return the number of possible lists of integers that you could have written down to get the string num. 
 * Since the answer may be large, return it modulo 109 + 7.
 */



class ValidSequencyNumber
{


    /**
     * he number of possible lists of integers that you could have written down to get the string num
     *
     * @param string $originalParams
     * @param array $aResultsValues
     * @return string
     */
    public static function validateDecimInteger(string $originalParams = null, array $aResultsValues = []) :string
    {
        $indexSeparation = null;
        $slicedArrayDecrease = [];
        $tmp_asc_values = [];

        $aoriginalParams = str_split($originalParams);

        for ($principalIndex = 0; $principalIndex < count($aoriginalParams) ; $principalIndex++) { 
            $tmp_asc_values [] = $aoriginalParams[$principalIndex];

            for ($indexToCompare = $principalIndex+1; $indexToCompare <= count($aoriginalParams) - 1 ; $indexToCompare++) { 
               if ( ($aoriginalParams[$principalIndex] < $aoriginalParams[$indexToCompare]) 
               &&
               ($aoriginalParams[$indexToCompare-1] < $aoriginalParams[$indexToCompare])) {

                $tmp_asc_values [] = $aoriginalParams[$indexToCompare];
                   
                } else {
                    $indexSeparation = $indexToCompare;

                    break;
                        }

            }

            break;
        }

        
        // array_slice — Extrait une tranche du tableau a partir de l'offset donné[$indexToCompare]
        $slicedArrayDecrease = array_slice($aoriginalParams, $indexToCompare);
        $tmp_asc_values = implode('', $tmp_asc_values);
        $originalParams = implode('', $slicedArrayDecrease);
        
        //  accumulation de tous les résultats ascendants dans [$aResultsValues]
        array_push($aResultsValues, $tmp_asc_values);
        
        if (count($slicedArrayDecrease) > 0) {
            
            return ValidSequencyNumber::validateDecimInteger($originalParams, $aResultsValues);
        } 
        
        var_dump($aResultsValues);

        return implode(',', $aResultsValues);
    }
}

ValidSequencyNumber::validateDecimInteger('234518465079943542');