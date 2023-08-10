<?php

class Abbreviation
{
    private array $aSameWords;
    private array $tmp_index_beta; 

    public function __construct() {
        $this->tmp_index_alpha = [];
        $this->aSameWords = [];
    }

    public function completeAbbreviationSequence(string $aplha, string $beta)
    {
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
                $this->changeSequences();
            }

        }

    }

    public function changeSequences(Type $var = null)
    {
        # code...
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