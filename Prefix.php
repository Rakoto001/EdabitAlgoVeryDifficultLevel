<?php
class Prefix
{

    /**
     * evaluate expression and make math operation
     */
    public static function makeMathOperation(string $_parametters)
    {
        $arrayParams   = explode(' ', $_parametters);
        $numbOne       =  $arrayParams[1];
        $numbTwo       =  $arrayParams[2];
        $mathOperation = $arrayParams[0];

        $result = $numbOne.$mathOperation.$numbTwo;
        //  Exécute une chaîne comme un script PHP , fortement déconseillé en php
        // $p = eval('return '.$result.';');
        if (preg_match('/(\d+)(?:\s*)([\+\-\*\/])(?:\s*)(\d+)/', $result, $realOpe)) {

            $mathOperation = $realOpe[2];
            $result = Prefix::checkPrefixAndOperate($numbOne, $numbTwo, $mathOperation);
        }
        echo $result;

        return $result;
    }

    /**
     * check math sign and make operation
     */
    public static function checkPrefixAndOperate($numbOne, $numbTwo, $mathOperation)
    {
        if($mathOperation == '+'){

            return $numbOne + $numbTwo;
        } elseif ($mathOperation == '-') {

            return $numbOne - $numbTwo;
        } elseif ($mathOperation == '*') {

            return $numbOne * $numbTwo;
        } elseif ($mathOperation == '/') {

            return $numbOne / $numbTwo;
        } elseif ($mathOperation == '%') {

            return $numbOne % $numbTwo;
        } 
    }


}

$givenVlue = '+ -10 10';
Prefix::makeMathOperation($givenVlue);