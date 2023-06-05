<?php

class CompressArray
{

    /** link: https://edabit.com/challenge/gEJwv2KgysoG9vaDh */

    // description 
    /**
    * The function is given an array of characters. Compress the array into a string using the following rules. For each group of consecutively repeating characters:
    * If the number of repeating characters is one, append the string with only this character.
    * If the number n of repeating characters x is greater than one, append the string with "x" + n.
     */

    const FIRST_INDEX = 0;

    /**
     * recursive function to make String Compression from Character Array
     *
     * @param array $paramsInput
     * @param string $results
     * @param [type] $lastUniqueArray
     * @return void
     */
    public static function compressArrayValues(array $paramsInput, string $results = null, $lastUniqueArray = null) : string
    {
        $copyResults = $results;
        $tmp_results_compresed = [];
        $tmp_recursive_garded_as_original = [];
        $firtChar = $paramsInput[self::FIRST_INDEX];

        foreach ($paramsInput as $key => $strCharValue) {

            if ($strCharValue == $firtChar) {

                $tmp_results_compresed[] = $firtChar;
                unset($paramsInput[$key]);

            } elseif ($strCharValue !== $firtChar) {
                //permet de redéfinir l'index du tableau à zéro
                $tmp_recursive_garded_as_original = (array_merge($tmp_recursive_garded_as_original, $paramsInput));
                break; // pour finir le bouvle dans la séquence non similaire
            }
        }

        //  si tmp_recursive_garded_as_original == 0 => alors les valeurs sont toutes uniques et l'array est unique aussi après récursivité
        if (count($tmp_recursive_garded_as_original) == 0) {
            $tmp_results_compresed = $tmp_results_compresed[self::FIRST_INDEX].count($tmp_results_compresed);
            // var_dump(($tmp_results_compresed));
            $compressedResults = $copyResults.$tmp_results_compresed;
            var_dump($compressedResults);
           

            return ($compressedResults);


        }


        if (count($tmp_recursive_garded_as_original) > 0) {

            // combiner le coupe content/count
            $tmp_results_compresed  = $tmp_results_compresed[0] . count($tmp_results_compresed);

            if ($results != null) {

                $tmp_results_compresed = $results . $tmp_results_compresed;
            }

            //récursive
            return CompressArray::compressArrayValues($tmp_recursive_garded_as_original, $tmp_results_compresed);
        }
    }

   
}
// ["a", "a", "b", "b", "c", "c", "c"]
// ["a", "b", "b", "b", "b", "b", "b", "b", "b", "b", "b", "b", "b"]
// ["t", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "s", "s", "s", "h"]
CompressArray::compressArrayValues(["t", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "s", "s", "s", "h"]);
