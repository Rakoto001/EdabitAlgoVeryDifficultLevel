<?php

/** link : https://www.hackerrank.com/challenges/ashton-and-string/problem?isFullScreen=true */



class AshtonString
{

    const ZERO_INDEX = 0;
    private $tmp_diff_restults;

    public function __construct() {
        $this->tmp_diff_restults = [];
    }

    /**
     * Arrange all the distinct substrings of a given string 
     * in lexicographical order and concatenate them
     *
     * @param string $inputChar
     * @param integer $responseIndex
     * @return string
     */
    public function makeAshtonString(string $inputChar, int $responseIndex) : string
    {
        $tmp_diff_restults = [];
        $aInputChars = str_split($inputChar); 

        for ($curentIndex = 0; $curentIndex < count($aInputChars); $curentIndex ++) {

             $partSlicedArray = (array_slice($aInputChars, $curentIndex));
             $this->tmp_diff_restults[] = implode('', array_diff($aInputChars, $partSlicedArray));

        }
        
        // elmination de l'index qui est null suite a l'opération de slicing
        $this->tmp_diff_restults = (array_filter($this->tmp_diff_restults, fn($contextChar) =>  $contextChar != null ));
        // rajout en fin de l'array la value input
        array_push($this->tmp_diff_restults, $inputChar);

        unset($aInputChars[self::ZERO_INDEX]);
        
        if (count($aInputChars) > 0) {
            $inputChar = implode('', $aInputChars);
            
            return $this->makeAshtonString($inputChar, $responseIndex);
        }
        
        var_dump(implode('', $this->tmp_diff_restults)); //final results

        return implode('', $this->tmp_diff_restults);

        
    }
}


$oShort = new AshtonString();
$oShort->makeAshtonString('abcd', 5);