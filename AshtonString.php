<?php

/** link : https://www.hackerrank.com/challenges/ashton-and-string/problem?isFullScreen=true */



class AshtonString
{

    const ZERO_INDEX = 0;
    private array  $tmp_restults;
    private array  $tmp_accumulation_lexicographical;

    public function __construct() {
        $this->tmp_restults = [];
        $this->tmp_accumulation_lexicographical = [];
    }

    /**
     * Arrange all the distinct substrings of a given string - recursive
     * in lexicographical order and concatenate them
     *
     * @param string $inputChar
     * @param integer $responseIndex
     * @return string
     */
    public function makeAshtonString(string $inputChar, int $responseIndex) 
    {
        $aInputChar = str_split($inputChar);
        $sequencesLexicographical = [];
        $newInputChar = [];

        // recherche min par ordre alphabetique en supposant qu'il  n'ya pas de doublons selon les spécifiacitons
        $inputChar = min($aInputChar);
        $indexAlphabetMin = array_search($inputChar, $aInputChar);
        $aAllCharacterAfterCurrentLexicographical = array_slice($aInputChar, $indexAlphabetMin);
        $sequencesLexicographical = $this->arrangeSequenceLexicographical($aAllCharacterAfterCurrentLexicographical);
        $this->tmp_restults[]  = $sequencesLexicographical;
        // dback
    //     echo '<pre>';
    //     var_dump($sequencesLexicographical);
    //    echo '</pre>';
    //    die;



        $newInputChar = $this->eliminateMinIndexFromInputChar($aInputChar,  $indexAlphabetMin);
     
        if (count($newInputChar) > 0 ) {
            $newInputChar = implode('', $newInputChar);
        //     echo '<pre>';
        //     var_dump($newInputChar);
        //    echo '</pre>';
        //    die;
            return $this->makeAshtonString($newInputChar,  $responseIndex);
        }

      
        echo '<pre>';
        var_dump(array_values($this->tmp_restults) );
       echo '</pre>';
        
     


        
    }

    /**
     * élimination de l'index min de la séquence des inputs
     *
     * @param array $aInputChar
     * @param integer $indexAlphabetMin
     * @return void
     */
    function eliminateMinIndexFromInputChar(array $aInputChar,  int $indexAlphabetMin)  :array
    {
      
        if (count($aInputChar)> 0){
            unset($aInputChar[$indexAlphabetMin]);
          
        }

      return $aInputChar;
    }


    /**
     * arrangement des séquences
     *
     * @param array $aAllCharacterAfterCurrentLexicographical
     * @return void
     */
    public function arrangeSequenceLexicographical(array $aAllCharacterAfterCurrentLexicographical)
    {
        // var_dump($aAllCharacterAfterCurrentLexicographical);
        $accumulation_lexicographical = [];
        // initialisation de temp accumulation
        $this->tmp_accumulation_lexicographical = [];

        foreach ($aAllCharacterAfterCurrentLexicographical as $key => $value) {
            if ($key == 0) {
                $this->tmp_accumulation_lexicographical[] = $aAllCharacterAfterCurrentLexicographical[$key];
                $accumulation_lexicographical[$key] = $aAllCharacterAfterCurrentLexicographical[$key];
            } elseif ($key > 0) {
                $this->tmp_accumulation_lexicographical[] = array_push($this->tmp_accumulation_lexicographical,$aAllCharacterAfterCurrentLexicographical[$key] ) ;
                $accumulation_lexicographical[$key] = $this->tmp_accumulation_lexicographical ;
             
              
            }
        }

    //     var_dump($aAllCharacterAfterCurrentLexicographical);
    //     echo '<pre>';
    //     var_dump($this->tmp_accumulation_lexicographical);
    //    echo '</pre>';
    
        // initialisation de temp accumulation
        $this->tmp_accumulation_lexicographical = [];
    //     echo '<pre>';
    //     var_dump($this->tmp_accumulation_lexicographical);
    //    echo '</pre>';

        return $accumulation_lexicographical;
    }
}


$oShort = new AshtonString();
$oShort->makeAshtonString('dback', 5);