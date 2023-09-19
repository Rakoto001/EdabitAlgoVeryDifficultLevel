<?php

// LINK https://www.hackerrank.com/challenges/abbr/problem?isFullScreen=true
class Abbreviation
{
    private array $aSameWords;
    private int $tmp_index_alpha; 

    public function __construct() {
        $this->tmp_index_alpha = 0;
        $this->aSameWords = [];
    }

    public function completeAbbreviationSequence(string $aplha, string $beta)
    {
        $alphaIndex = null;

        $aAlpha = str_split($aplha);
        $aBeta = str_split($beta);

        foreach ($aBeta as $keyIndexBeta => $currentBetaStr) {

            $this->tmp_index_alpha = $this->checkUpperAndLOwerAlphaContent($currentBetaStr, $aAlpha);
            
            if (count( $this->tmp_index_alpha) > 0) {

                $this->canMakeAbbreviation($aAlpha, $keyIndexBeta);
            }

        }
    }

    public function canMakeAbbreviation(array $aAlpha, $keyIndexBeta)
    {
       
          //afin d'éliminer les nommination des index par algo on utilise array_values => 
          $alphaIndex = current(array_values($this->tmp_index_alpha));
          $alphaValue = ($aAlpha[$alphaIndex]);
          var_dump($alphaIndex);
          die;

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
$oAbrviate->completeAbbreviationSequence('AbcDE', 'ABCDE');