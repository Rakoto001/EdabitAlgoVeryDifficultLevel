<?php

// link : https://edabit.com/challenge/5cefoardyvgEb52JB

/** description */

// The function is given two strings $t - template, $s - to be sorted. 
// Sort the characters in $s such that if the character is present in $t then it is sorted according
//  to the order in $t and other characters are sorted alphabetically after the ones found in $t.




class RemakeSorting
{
    const ERR_PARAMS = 'paramètres non compatible';

    /**
     * Sort a String with the Given Template
     *
     * @param string $templates
     * @param string $parametters
     * @return string
     */
    public static function customSortt(string $templates, string $parametters) :string
    {
        $tmp_firstPart = [];
        $aTemplates = str_split($templates);
        $aparametters = str_split($parametters);
        
        
        if (count($aparametters) > count($aTemplates)) {
            

            foreach ($aTemplates as $key => $singleValueTemplate) {
                $index = array_search($singleValueTemplate, $aparametters);
                $tmp_firstPart[] = $aparametters[$index];
                unset($aparametters[$index]);
                
            }
            
        } else{
            
            throw new Exception(self::ERR_PARAMS);
        }

        
        $resultsSorting = RemakeSorting::makeOrderStr($tmp_firstPart, $aparametters);
        var_dump($resultsSorting);

        return $resultsSorting;
        
    }
    
    
    
    /**
     * order in alphabet
     *
     * @param array $afirstPartValues
     * @param array $asecondPartValues
     * @return string
     */
    public static function makeOrderStr(array $afirstPartValues, array $asecondPartValues) :string
    {
        
        (asort($asecondPartValues));
        $firstPartValues = implode('', $afirstPartValues);
        $secondPartValues = implode('', $asecondPartValues);
        

        return $firstPartValues.$secondPartValues;

    }
}

RemakeSorting::customSortt("edc", "abcdefzyxp");