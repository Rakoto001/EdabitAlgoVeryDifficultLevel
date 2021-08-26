<?php
/** 
 *  DESCRIPTION / 
 * Given an array of strings and an original string, 
 * write a function to output an array of boolean values 
 * - true if the word can be formed from the original word by swapping two letters only once 
 * and false otherwise.
 */
class LetterSwap
{


    /**
     * check each letter if swap exist or not
     *
     * @param array $_parametters
     * @param string $_paramsLetters
     * @return void
     */
    public static function checkSwap(array $_parametters, string $_paramsLetters)
    {
        foreach($_parametters as $paramsValue){
            
            $results[] = LetterSwap::checkLettersCombinaison($paramsValue, $_paramsLetters);
        }
        var_dump($results);


        return $results;

    }

    /**
     * check if letters are equals function
     *
     * @param [type] $_givenSwap
     * @param [type] $_paramsToCompare
     * @return bool
     */
    public static function checkLettersCombinaison($_givenSwap, $_paramsToCompare)
    {
        $countDiff       = 0;
        $givenSwap       = str_split($_givenSwap);
        $paramsToCompare = str_split($_paramsToCompare); 
        $tmp_key = [];
        
        foreach ($givenSwap as $key => $value) {
            if ($value != $paramsToCompare[$key]) {
                $countDiff ++;
                // si la différence est plus de 2, return false
                if ($countDiff > 2) {

                    return false;
                } else {
                    $tmp_key[$key] =  $value;
                }
            }
        }
        // LetterSwap::SwapLetter($letterOne, $letterTwo, $givenSwap);
        // $resultedSwap = LetterSwap::SwapLetter($tmp_key, $givenSwap);

        return true;
        
    }

 /**   code en attente d'optimisation **/
    /**
     * change the letters 
     *
     * @param [type] $letterOne
     * @param [type] $letterTwo
     * @param [type] $originalParams
     * @return string 
     */
    public function SwapLetter($tmpSwaps, $originalParams)
    {
        // var_dump($tmpSwaps);
        // echo '<br>';
        // $tmp_realSwap = array_reverse($tmpSwaps);
        // var_dump($tmpSwaps);
        // echo '<br>';
        // var_dump($tmp_realSwap);
        // die();
        // foreach ($tmp_realSwap as $key => $value) {
        //     var_dump($key);
        // }
        //  Remplace les éléments d'un tableau par ceux d'autres tableaux
        // $reversedSwap = array_replace($originalParams, $realSwap);

        // return $reversedSwap;

        
    }
}


//  check th code
$params = ["EBCDA", "BACDE", "BCDEA"];
$letters = "ABCDE";
LetterSwap::checkSwap($params, $letters);