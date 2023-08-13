<?php


/** link hackerRank => https://www.hackerrank.com/challenges/abbr/problem */




class Abbreviation
{

    const DELETE_OPERATION = "Delete()";
    const LOWER_OPERATION = "strLower()";
    const UPPER_OPERATION = "strUpper()";

    private array $aSameWords;
    private array $tmp_index_beta; 
    private array $allOperations; 

    public function __construct() {
        $this->tmp_index_alpha = [];
        $this->aSameWords = [];
        $this->allOperations = [];
    }

    /**
     * Undocumented function
     *
     * @param string $aplha
     * @param string $beta
     * @return array
     */
    public function completeAbbreviationSequence(string $aplha, string $beta) :array
    {
        $aResults = [];
        $alphaIndex = null;
        $normalizedValues = [];

        $normalizedValues = $this->normalizeValue($aplha, $beta);
        $alphas = $normalizedValues['alpha'];
        $aBetas = $normalizedValues['beta'];
       
        foreach ($aBetas as $keyIndexBeta => $currentBetaStr) {

            if ( !($this->isContent($currentBetaStr, $alphas)) ) {
                
                $this->tmp_index_alpha = [];

            break;
            }

        }

        if (!empty($this->tmp_index_alpha)) {
            $allIndexAlpha = $this->tmp_index_alpha;

            if ($this->operationFesabiity($allIndexAlpha)) {

                // pour opération de supression ou d'éventuel action sur l'ensemble des mots
                $aResults = $this->changeSequences($aplha, $beta);
            }

        }

        var_dump($this->allOperations);
        var_dump($aResults); // 
        die;

        return $aResults;

    }

    
    /**
     *
     * @param string $alphas
     * @param string $beta
     * @return array
     */
    public function changeSequences(string $alphas, string $beta) :array
    {
        $aResuts = [];
        $aResultFromRemove = [];
        $aResultFromlowerAndpperOperations = [];

        $alphas = str_split($alphas);
        $aBetas = str_split($beta);


        if ( $this->canDeleteAnotherStr($alphas, $aBetas) ) {

           $aResultFromRemove = $this->removeStrDIfference($alphas, $aBetas);
        }

        // toujours possible de faire l'opération si operationFesabiity() == ture
        $aResultFromlowerAndpperOperations = $this->lowerAndUpperOperations($alphas, $aBetas);

        if ( count($aResultFromRemove) > 0 ) {
            // opération de comparaison entre les deux results

        }
        $aResuts = $aResultFromlowerAndpperOperations;

        return $aResuts;
    }


    /**
     * 
     *
     * @param array $alphas
     * @param array $aBetas
     * @return array
     */
    public function lowerAndUpperOperations(array $alphas, array $aBetas) :array
    {
        $aResults = [];
        foreach ($aBetas as $key => $betaStr) {

            $aResults [] = $this->searchUpperAndLOwerAlphaContent($betaStr, $alphas);
            # code...
        }

        return $aResults;
    }


    /**
     * suppr la difference enter alphas et aBetas
     *
     * @param array $alphas
     * @param array $aBetas
     * @return array
     */
    public function removeStrDIfference(array $alphas, array $aBetas) :array
    {
        $aResults = [];
        // foreach ($aBetas as $key => $betaStr) {

        //     $this->searchUpperAndLOwerAlphaContent($betaStr, $alphas);
        //     # code...
        // }
        $this->allOperations[] = self::DELETE_OPERATION;
        $aResults = $this->tmp_index_alpha;

        return $aResults;
    }




    
    public function searchUpperAndLOwerAlphaContent($currentBetaStr, $aAlpha) :string
    { 
        $results = [];

        $upperTestIndex = array_search(strtoupper($currentBetaStr), $aAlpha);
        $lowerTestIndex = array_search(strtolower($currentBetaStr), $aAlpha);
        $testIndex = array_search($currentBetaStr, $aAlpha);

        if (is_int($testIndex)) {

            return $aAlpha[$testIndex];
        } elseif (is_int($lowerTestIndex)) {
            // si la recherche a nécessité le lower alors lopération doit être le UPPER
            $this->allOperations[] = self::UPPER_OPERATION;

            return strtoupper($aAlpha[$lowerTestIndex]);
        } elseif (is_int($upperTestIndex)) {
            // si la recherche a nécessité le upper alors lopération doit être le LOWER
            $this->allOperations[] = self::LOWER_OPERATION;
           
            return strtolower($aAlpha[$upperTestIndex]);
        }
        return $currentBetaStr;
    }



    /**
     * 
     *
     * @param array $alphas
     * @param array $aBetas
     * @return boolean
     */
    public function canDeleteAnotherStr(array $alphas, array $aBetas) :bool
    {
        if ( count($alphas) > count($aBetas) ) {

            return true;
        }

        return false;
    }


    /**
     * 
     *
     * @param array $allIndexAlpha
     * @return boolean
     */
    public function operationFesabiity(array $allIndexAlpha) :bool
    {
       asort($allIndexAlpha);
       $sOrderIndexAlpha = implode('', $allIndexAlpha);
       $stmpIndexAlpha = implode('', $this->tmp_index_alpha);

       if ($stmpIndexAlpha == $sOrderIndexAlpha) {

        return true;
       }
        
        return false;
    }

     /**
     * Undocumented function
     *
     * @param string $currentBetaStr
     * @param array $aAlpha
     * @return boolean
     */
    public function isContent(string $currentBetaStr, array $aAlpha) :bool
    {
        $indexAlpha = array_search(($currentBetaStr), $aAlpha);

        if (is_numeric($indexAlpha)) {

            $this->tmp_index_alpha[] = $indexAlpha;
            return true;
        }
        
        return false;
    }


    /**
     * normalisation de inputs
     *
     * @param string $aplha
     * @param string $beta
     * @return array
     */
    public function normalizeValue(string $aplha, string $beta) :array
    {
        $normalizedValues = [];
        $aAlpha = str_split($aplha);
        $aBeta = str_split($beta);

        $alphas = array_map(function($a) {

            return strtolower($a);

        }, $aAlpha);

        $aBetas = array_map(function($b) {

            return strtolower($b);

        }, $aBeta);


        return [
            'alpha' => $alphas,
            'beta' => $aBetas
        ];

    }

   

    public function canMakeAbbreviation(array $aAlpha, $keyIndexBeta)
    {
       
          //afin d'éliminer les nommination des index par algo on utilise array_values => 
          $alphaIndex = current(array_values($this->tmp_index_alpha));
          $alphaValue = ($aAlpha[$alphaIndex]);

          if ($keyIndexBeta > $alphaIndex) {

            return false;
          }


          return true;
        
    }

    public function checkUpperAndLOwerAlphaContent($currentBetaStr, $aAlpha) :array
    { 
        $results = [];

        $upperTest = array_search(strtoupper($currentBetaStr), $aAlpha);
        $lowerTest = array_search(strtolower($currentBetaStr), $aAlpha);
        $test = array_search($currentBetaStr, $aAlpha);
       

        if (is_int($upperTest)) {

            return ['upperoperation' => $upperTest];
        } elseif (is_int($lowerTest)) {

            return ['loweroperation' => $lowerTest];
        } elseif (is_int($test)) {

            return ['exactoperation' => $test];

        }

        return $results;
    }
}


$oAbrviate = new Abbreviation();
$oAbrviate->completeAbbreviationSequence('abclDE', 'ABCDE');
// $oAbrviate->completeAbbreviationSequence('daBcd', 'ABC');