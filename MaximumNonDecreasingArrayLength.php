<?php

//  link : https://leetcode.com/problems/find-maximum-non-decreasing-array-length/description/

class MaximumNonDecreasingArrayLength
{
    private int $tmpResutlAdditionOperation;
    private array $tmpResutSequenceOfCandidates;
    
    public function __construct() {
    }

    public function getMaximumNonDecreasingArrayLength(array $inputNumbers)
    {
    
        $sequenceOfCandidates = $this->additionOperation($inputNumbers);
        // rassembler les séquences de candidats et le input
        array_push($sequenceOfCandidates, $inputNumbers);
       
        // rechercher l'array non décroissant le plus long
        $aSequenceNonDecreasing = $this->searchSequenceNonDecreasing($sequenceOfCandidates); 
       
        $maxLenthNonDecreasing = $this->getMaximumNonDecreasingNumbers($aSequenceNonDecreasing, $inputNumbers);
        echo 'Max Lenth Non decreasing  = ' . $maxLenthNonDecreasing;

        return $maxLenthNonDecreasing;
        
    }


    public function getMaximumNonDecreasingNumbers(array $aSequenceNonDecreasing, array $inputNumbers)
    {
        $aLenthAccumulation = [];

        if (count ($aSequenceNonDecreasing) > 0) {
            foreach ($aSequenceNonDecreasing as $key => $aSequences) {
                $aLenthAccumulation[] = count($aSequences);
            }
            
        } elseif (count($aSequenceNonDecreasing) <= 0){
              // si aucun résultat alors on fait la somme du tableau et cela signifie que le macLentNondecreasing === 1
            $aLenthAccumulation [] = 1;
        }


        return max($aLenthAccumulation);
    }

    public function searchSequenceNonDecreasing(array $sequenceOfCandidates) :array
    {
        $aSequenceNonDecreasing = [];

        if (count($sequenceOfCandidates) > 0)
        {
           
            foreach ($sequenceOfCandidates as $key => $aCandidates) {
                
                
                $originalCandidate  = $aCandidates;
                asort($aCandidates);
                
                
                if ($aCandidates === $originalCandidate){
                   $aSequenceNonDecreasing[] = $aCandidates;
                }
             
            }

          
        return ($aSequenceNonDecreasing);
        }
        return $aSequenceNonDecreasing;
    }

    public function additionOperation(array $inputNumbers) :array
    {
        $sequenceOfCandidates = [];

        for ($lastIndex = count($inputNumbers)-1; $lastIndex >= 0; $lastIndex--){

            if ($lastIndex != 0){
                $this->tmpResutlAdditionOperation = $this->makeOperation($inputNumbers[$lastIndex], $inputNumbers[$lastIndex-1]);
                // unset 
               $this->tmpResutSequenceOfCandidates[] =  $this->constructSequenceOfCandidate($inputNumbers, $lastIndex);
        
            }

        }

        $sequenceOfCandidates = $this->tmpResutSequenceOfCandidates;


        return $sequenceOfCandidates;
    }

    /**
     * opération d'addition
     *
     * @param integer $alphaValue
     * @param integer $betaValue
     * @return void
     */
    public function makeOperation(int $alphaValue, int $betaValue)
    {

        return $alphaValue + $betaValue;
    }


    /**
     * construction de séquence de nombre possible que ce soit croissant ou decvroissant en fonction de input nulbers, lastInd et $tmpResutlAdditionOperation
     *
     * @param array $inputNumbers
     * @param integer $lastIndex
     * @return void
     */
    function constructSequenceOfCandidate(array $inputNumbers, int $lastIndex)
    {
        $sequenceOfCandidates = [];
        //supprimer the last index et lastindex-1 dans le but de ne garder que les valeurs a ajouter avec l'opération d'addition
        unset($inputNumbers[$lastIndex]);
        unset($inputNumbers[$lastIndex-1]);
        array_splice($inputNumbers, $lastIndex-1, 0, $this->tmpResutlAdditionOperation);

        $sequenceOfCandidates = $inputNumbers;

        return $sequenceOfCandidates;
    }

}

$oIncrease = new MaximumNonDecreasingArrayLength();
$oIncrease->getMaximumNonDecreasingArrayLength([4,3,2,6]);
