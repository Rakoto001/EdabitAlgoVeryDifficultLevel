<?php




/** Problem Solving (Advanced) || difficulty:hard */
//  link : https://www.hackerrank.com/challenges/string-similarity/problem?isFullScreen=true



class SimilarityPatterns
{

    private array $aAccumulationSubPattersSimilarity;
    private array $copyOriginalInput;
  

    public function __construct() {
        $this->aAccumulationSubPattersSimilarity = [];
     
    }


    /**
     * Calculate the sum of similarities of a string S with each of it's suffixes
     *
     * @param string $inputValue
     * @return integer
     */
    public function stringSimilarity(string $inputValue) :int
    {
        $aAllSubSimilarities = [];
        $allCountSimilarities = 0;

        $aInputValue = str_split($inputValue);
        $this->copyOriginalInput = $aInputValue;
        $aAllSubSimilarities = $this->constructSubPatterns($aInputValue);
        $allCountSimilarities = $this->getAllSequenceSimilarities($aInputValue, $aAllSubSimilarities);

        var_dump($allCountSimilarities);

        return $allCountSimilarities;
    }


    /**
     * get all the similarities of sequences
     *
     * @param array $inputValue
     * @param array $aAllSubSimilarities
     * @return integer
     */
    public function getAllSequenceSimilarities(array $inputValue, array $aAllSubSimilarities) :int
    {
        $countSimilarity = [];
        $countSubPattersSimilarity = 0;

        if ( is_array($aAllSubSimilarities) && (count($aAllSubSimilarities)) > 1 ) {

            foreach ($aAllSubSimilarities as $index => $aSuffixes) {

                    if ( current($aSuffixes) == current($inputValue) ) {
                        $countSimilarity[] = $this->countAllSameSequences($inputValue, $aSuffixes);
                    }
            }
        }

        $this->aAccumulationSubPattersSimilarity = $countSimilarity;
        $countSubPattersSimilarity = (array_sum($this->aAccumulationSubPattersSimilarity));

        return $countSubPattersSimilarity;
    }


    /**
     * count les mme séquences
     *
     * @param array $inputValue
     * @param array $aSuffixes
     * @return boolean
     */
    public function countAllSameSequences(array $inputValue,array $aSuffixes) :int
    {
        $countSimilarity = 0;
     
        foreach ($aSuffixes as $currentIndex => $strToCompare) {
            if ($strToCompare == $inputValue[$currentIndex]) {

                $countSimilarity++;
            }
            # code...
        }
       
        return $countSimilarity;
    }



    /**
     * construct all sub sequences(sufixes)
     *
     * @param array $aInputValue
     * @param array $aSubPatterns
     * @return array
     */
    public function constructSubPatterns(array $aInputValue, $aSubPatterns = []) :array
    {
        $newInputValues = [];

        if ( count($aInputValue) > 1 ) {
            $newInputValues = array_slice($aInputValue,1);
            array_push($aSubPatterns, $newInputValues);
        
            return $this->constructSubPatterns($newInputValues, $aSubPatterns);
        }

       array_unshift($aSubPatterns,$this->copyOriginalInput);
        
        return $aSubPatterns;
    }

}

$oSimilarity = new SimilarityPatterns();
$oSimilarity->stringSimilarity("ababaa");