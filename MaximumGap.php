<?php
/**
 * leetcode link : https://leetcode.com/problems/maximum-gap/
 */
class MaximumGap{

    /**
     * get the Maximum Gap 
     *
     * @param array $aNumber
     * @return void
     */
    public static function getMaximumGap(array $aNumber)
    {
        $numbMax = 0;
       
        if (count($aNumber) == 2) {

            return 0;
        }

        $isNumericValues = self::checkArrayContent($aNumber);
       

        if ($isNumericValues) {

            $tmp_diff_result = [];
            $sortedNumbers   = [];
            asort($aNumber);
            $sortedNumbers = str_split(implode('', $aNumber));

            for($index = 0; $index<count($aNumber)-1; $index++){
            
                $tmp_diff_result[] = $sortedNumbers[$index+1] - $sortedNumbers[$index];
                
            }

            $numbMax = max($tmp_diff_result);
            var_dump($numbMax);
            return $numbMax;

            } else {
                echo 'vos paramètres sont inexactes';
            }

        return $numbMax;

        
    }

    /**
     * checker le contenu de l'array
     *
     * @param array $aNumber
     * @return bool
     */
    public static function checkArrayContent(array $aNumber): bool
    {
        $aChecked = array_map(function($num){
             if(is_numeric($num)) {

                return $num;
             } else {

                return false;
             }
        }, $aNumber);

        $isFalse = array_search(false, $aChecked, true);

        if (is_numeric($isFalse)) {

            // return false si existe autre que integer
            return false;
        }

        return true;
    }
}


MaximumGap::getMaximumGap([  1,6,8,4]);