<?php
class FunnyNumbers
{
    /**
     *  function which takes a number $n and a positive integer $p 
     * and returns a positive integer k
     */
    public static function checkFunnyNumbers(int $_paramsNumber, int $_power)
    {
        $arrayParams = str_split($_paramsNumber);
        foreach($arrayParams as $value){
            $tmp_resultPower [] = pow($value, $_power++);
        }
        $arrayResults = array_sum($tmp_resultPower);
        //test si c'est un entier positif
        $k = 5.1;
        if (is_int($k)) {
            
            return $k;
        }
        
        return null;
    }
}

$number = 695;
$power = 2;
FunnyNumbers::checkFunnyNumbers($number, $power);