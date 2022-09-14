<?php

/**
 * link: leetCode level Hard :https://leetcode.com/problems/wildcard-matching/
 * 
 * subject:
 * Given an input string (s) and a pattern (p), implement wildcard pattern matching with support for '?' and '*' where:
 * '?' Matches any single character.
 * '*' Matches any sequence of characters (including the empty sequence).
 * The matching should cover the entire input string (not partial).
 */



class WildCardMAtch{

    const  INTEROGATION = '?';
    const  SPACE        = ' ';
    const  ALL          = '*';


    /**
     * test the WikdCard
     *
     * @param string $sWords
     * @param string $sPattern
     * @return boolean
     */
    public static function testWildCard(string $sWords, string $sPattern) : bool
    {
        $bResults = false;
        $aWords   = str_split($sWords);
        $aPattern = str_split($sPattern);

        $allContents = self::checkPattersContent($aWords, $aPattern);

        $isFalse = array_search(false, $allContents);

        if ($isFalse == false) {

            $bResults = true;
        } else {

            $bResults = false;
        }

        var_dump($bResults);

        return $bResults;

    }

    /**
     * check the content of Patterns
     *
     * @param array $aWords
     * @param array $aPattern
     * @return array
     */
    public static function checkPattersContent(array $aWords, array $aPattern): array
    {

        $aResults = [];

        if ((count($aWords)>0 && count($aPattern)>0 ) && (count($aWords) == count($aPattern)) ) {


            for($indexSinglaWords = 0; $indexSinglaWords<count($aPattern); $indexSinglaWords++){

                if ($aPattern[$indexSinglaWords] == $aWords[$indexSinglaWords]) {

                    $aResults[] = true; 
                } elseif (($aPattern[$indexSinglaWords] == self::INTEROGATION) && ($aWords[$indexSinglaWords] != self::SPACE)){
                    
                    $aResults[] = true; 
                } elseif (($aPattern[$indexSinglaWords] == self::ALL)){
                    
                    $aResults[] = true; 
                } else {
                    
                    $aResults[] = false; 
                }
            }


        } elseif ((count($aPattern) == 1) && $aPattern[0] == '*') {

            $aResults[] = true;
        } else { //dans le cas impossible 

            $aResults[] = false;
        }

        return $aResults;
    }
}

WildCardMAtch::testWildCard('ea', '?a');