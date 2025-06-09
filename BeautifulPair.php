<?php


//DESCRIPTION  : 
/**
 * A pair of indices  is beautiful if the  element of array  is equal to the  element of array .
* In other words, pair  is beautiful if and only if . A set containing beautiful pairs is called a beautiful set.
* A beautiful set is called pairwise disjoint if for every pair  belonging to the set there is no repetition of either  or  values.
* For instance, if  and  the beautiful set  is not pairwise disjoint as there is a repetition of , that is .

* Your task is to change exactly  element in  so that the size of the pairwise disjoint beautiful set is maximum.

* Function Description

* Complete the beautifulPairs function in the editor below. It should return an integer that represents the maximum number of pairwise disjoint beautiful pairs that can be formed.

* beautifulPairs has the following parameters:

*A: an array of integers
*B: an array of integers>>
 */

 // link : https://www.hackerrank.com/challenges/beautiful-pairs/problem?isFullScreen=true
class BeautifulPair
{

    /** @var int */
    private int $beautifullPair = 0;

    /** @var array */
    private array $tmpNonEvenAlphaValue = [];



    /**
     * Constructs beautiful pairs from two input arrays.
     *
     * This function takes two arrays as input parameters and performs the following:
     * - Validates that both arrays have the same length.
     * - Processes the input arrays to check pairs and create beautiful pairs.
     * - Outputs the beautiful pairs for debugging purposes.
     *
     * @param array $inputAlphaParameters The first input array of parameters.
     * @param array $inputBEtaParameters The second input array of parameters.
     * 
     * @throws Exception If the two input arrays do not have the same length.
     * 
     * @return int The number of beautiful pairs created.
     */
    function constructBeautifullPairs(array $inputAlphaParameters, array $inputBEtaParameters): int
    {
        if (count($inputAlphaParameters) != count($inputBEtaParameters)) {

            throw new Exception('The two arrays must have the same length.');
        }

        $pairResults = $this->checkPairFromInputs($inputAlphaParameters, $inputBEtaParameters);
        $beautifulPairs = $this->makeBeautifulPairs($pairResults);
        echo '<pre>';
        print_r($beautifulPairs);
        echo '</pre>';
       
        return $beautifulPairs;
    }


     /**
     * Adjusts the count of beautiful pairs based on the given pair results.
     *
     * This method modifies the 'beautifullPair' count in the input array based on the 
     * presence of non-even alpha values. If there are non-even alpha values, the count 
     * is incremented. Otherwise, it is decremented.
     *
     * @param array $pairResults An associative array containing:
     *                           - 'NonEvenAlphaValue': An array of non-even alpha values.
     *                           - 'beautifullPair': An integer representing the current count of beautiful pairs.
     *
     * @return array The updated array with the modified 'beautifullPair' count.
     *
     * @throws Error If there is an issue with the variable reference in the return statement.
     */
    public function makeBeautifulPairs(array $pairResults) :int
    {

        if (count($pairResults['NonEvenAlphaValue']) > 0) {
            $pairResults['beautifullPair']++;
        } else {
        //cbeautiful_pairs == initial array_lengh -- You must change exactly one element in B
        $pairResults['beautifullPair']--;
        }

        
        return $pairResults['beautifullPair'];
    }



    /**
     * Recursively checks for pairs between two input arrays and processes them.
     *
     * This method compares elements from two input arrays (`$inputAlphaParameters` and `$inputBEtaParameters`) 
     * to find matching pairs. If a match is found, it increments the `beautifullPair` counter, removes the 
     * matched elements from both arrays, and continues the process recursively. If no match is found, 
     * non-matching elements from `$inputAlphaParameters` are stored in a temporary variable 
     * (`tmpNonEvenAlphaValue`) and removed from the array.
     *
     * @param array $inputAlphaParameters The first input array to check for pairs.
     * @param array $inputBEtaParameters The second input array to check for pairs.
     * @param bool $initialCall Indicates whether this is the initial call to the function. Defaults to true.
     *
     * @return mixed Returns an array containing the remaining elements of both input arrays, 
     *               the count of beautiful pairs (`beautifullPair`), and non-even alpha values 
     *               (`NonEvenAlphaValue`) if `$initialCall` is false. Returns an empty array otherwise.
     *
     * @throws Exception If either of the input arrays is empty during the initial call.
     */
    public function checkPairFromInputs(array $inputAlphaParameters, array $inputBEtaParameters, $initialCall = true): mixed
    {

        if ((count($inputAlphaParameters) <= 0 && $initialCall) || (count($inputBEtaParameters) <= 0 && $initialCall)) {

            throw new Exception('The two arrays must not be empty.');
        }

        if ((count($inputAlphaParameters) <= 0 && $initialCall === false)) {

            return [
                'inputAlphaParameters' => $inputAlphaParameters,
                'inputBEtaParameters' => $inputBEtaParameters,
                'beautifullPair' => $this->beautifullPair,
                'NonEvenAlphaValue' => $this->tmpNonEvenAlphaValue
            ];
        }


        foreach ($inputAlphaParameters as $alphaKey => $alphaValue) {
            foreach ($inputBEtaParameters as $betaKey => $betaValue) {
                if ($alphaValue == $betaValue) {
                    $this->beautifullPair++;
                    // deletes same indexes 
                    unset($inputAlphaParameters[$alphaKey]);
                    unset($inputBEtaParameters[$betaKey]);
                    // reindex table
                    $inputAlphaParameters = array_values($inputAlphaParameters);
                    $inputBEtaParameters = array_values($inputBEtaParameters);

                    return $this->checkPairFromInputs($inputAlphaParameters, $inputBEtaParameters, false);
                } elseif ($alphaValue != $betaValue) {
                    // put in a var temp the values not same (non even)
                    array_push($this->tmpNonEvenAlphaValue, $inputAlphaParameters[$alphaKey]);
                    //  deletes same indexes for alphaValue only
                    unset($inputAlphaParameters[$alphaKey]);
                    // reindex table
                    $inputAlphaParameters = array_values($inputAlphaParameters);

                    return $this->checkPairFromInputs($inputAlphaParameters, $inputBEtaParameters, false);
                }
            }
        }


        return [];
    }


}





// test and run algorithm


try {
    $bp = new BeautifulPair();
    $bp->constructBeautifullPairs([1, 2, 3, 4], [2, 3, 4, 5, 6]);
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
    // Tu peux aussi faire : error_log($e->getMessage());
}
