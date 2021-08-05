<?php

class AlphabetIndex
{

    /**
     * find the max alphabet and his index based in real alphabet
     */
    public static function findMaxAlphabet(string $_paramsWords)
    {
        $alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
       
        $tmpArrayWords = str_split($_paramsWords);
        arsort($tmpArrayWords);
        $strWords            = implode('', $tmpArrayWords);
        $firstMaxWords       = $strWords[0];
        $position            = array_search($firstMaxWords, $alphabet);
        $maxWordsAndPosition = $position.$firstMaxWords;
        var_dump($maxWordsAndPosition);

        return $maxWordsAndPosition;
    }
}



//test 
$words = 'Andrey';
// $words = 'Flavio';
AlphabetIndex::findMaxAlphabet($words);