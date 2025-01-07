<?php

class MaximumValueSubString {

    public array $aTmpResult;
    public array $aTmpAccumulation;
    public array $aTmpAdditionalSubChain;

    public function __construct() 
    {
        $this->aTmpResult = [];
        $this->aTmpAccumulation = [];
        $this->aTmpAdditionalSubChain = [];
    }

    function searchMaxSubChain(string $inputInitialValue) : int 
    {
        $finalMaxSubSequence = 0;
        $inputInitialValue = str_split($inputInitialValue);

        if (count($inputInitialValue) > 0) {
            foreach ($inputInitialValue as $additionalOperationNumber => $value) {
                $this->getSubSequence($inputInitialValue, $additionalOperationNumber);
            }
        }

        return $finalMaxSubSequence;
    }

    /**
     * fonction qui arrange les subSequences d'un input en fonction du nombre d'opération à additionner
     *
     * @param array $inputInitialValue
     * @param integer $additionalOperationNumber
     * @return array
     */
    function getSubSequence(array $inputInitialValue, int $additionalOperationNumber) :array
    {
        $asubSequenceResults = [];
        $aAdditionalWords = [];

        if ($additionalOperationNumber === 0) { // si $additionalOperationNumber == 0 => pas besoin de faire un ajout supplémentaire sur les subsequences

            // accumulation un par un des inputs dans le variable aTmpAccumulation 
            foreach ($inputInitialValue as $key => $value) {
                $this->aTmpAccumulation [] = array_push($this->aTmpAccumulation, $inputInitialValue[$key]);
                unset($inputInitialValue[$key]);
            }
            
        } elseif ($additionalOperationNumber > 0) { // si $additionalOperationNumber > 0 => besoin de faire un ajout supplémentaire sur les subsequences
     

           unset($inputInitialValue[$additionalOperationNumber-1]);
           $aAdditionalWords[] = $this->createAdditionalWords($inputInitialValue, $additionalOperationNumber);
           var_dump($aAdditionalWords);
           die;

        }
        
        $asubSequenceResults =  $this->aTmpAccumulation;
        // echo '<pre>';
        // // var_dump($this->aTmpAccumulation);
        // var_dump(  $this->aTmpResult);
        // echo '</pre>';

        // die;
        $this->aTmpResult[$additionalOperationNumber] = $asubSequenceResults; 
        return $asubSequenceResults;
        
    }

    public function createAdditionalWords(array $inputInitialValue, int $additionalOperationNumber) : array
    {
        $aResultAdditionalWords = [];
    
        // construction des index a ajouter pour la sub Sequence
        $indexAdditionalWords = range(0, $additionalOperationNumber-1);
        // une initialisation de l'index est necéssaire
        $inputInitialValue = str_split(implode('', $inputInitialValue));
        // var_dump($additionalOperationNumber);
        foreach ($indexAdditionalWords as $key => $value) {
            $aResultAdditionalWords[] =  $inputInitialValue[$key];
        }
        

        return $aResultAdditionalWords;
    }




}


$maxVal = new MaximumValueSubString();
$maxVal->searchMaxSubChain("ababc");