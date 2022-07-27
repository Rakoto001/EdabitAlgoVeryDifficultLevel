<?php
class SortString {

    const ERROR_VALUES = 'input must be string';

    /**
     *  function that takes a string consisting of lowercase letters, 
     * uppercase letters and numbers and returns the string sorted 
     *
     * @param [type] $_values
     * @return string
     */
    public static function sortByString($_values): string
    {
        $a_tmp_string  = [];
        $a_tmp_numb    = [];
        $aTmp_res_Sort = [];
        $alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
        
        if (is_string($_values)) {

            foreach(str_split($_values) as $index => $currentValue){
             
                if (is_numeric($currentValue)) {
                    $a_tmp_numb []   = $currentValue;
                } else {
                    $a_tmp_string [] = $currentValue;
                }
            }

            foreach ($alphabet as $key => $currentStrBasic) {
                foreach ($a_tmp_string as $key => $currentStrValue) {
                   
                    if ($currentStrBasic === $currentStrValue || strtoupper($currentStrBasic) === $currentStrValue) {
                        $aTmp_res_Sort [] = $currentStrValue;
                    }
                }
            }

            return implode('', $aTmp_res_Sort).implode('', $a_tmp_numb);

        } else {

            throw new Exception(self::ERROR_VALUES);

        }
    }
}

SortString::sortByString("eA2a1E");