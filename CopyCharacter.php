<?php


class CopyCharacter
{
    const VALUE_ONE   = 1;
    const VALUE_ZERO  = 0;

    public static function makeCopyStr($_params)
    {
        $aParams = str_split($_params);
        CopyCharacter::searchMinIndex($aParams);
    }

    public static function searchMinIndex(array $aParams, $count = 0)
    {
        $tmp_two_value = [];
        
        if( is_array($aParams) && count($aParams) > 2 ){

        $tmp_two_value = array_push($tmp_two_value, $aParams[self::VALUE_ZERO]).
        $tmp_two_value = array_push($tmp_two_value, $aParams[self::VALUE_ONE]).

        CopyCharacter::copyCHaracters($tmp_two_value);

        } 
    }

    public static function copyCHaracters(array $aValues) {
        $tmp_result_copy = [];

        for($numRelatedCopy = 0; $numRelatedCopy < 4; $numRelatedCopy++){
            
            array_push($tmp_result_copy, $aValues[self::VALUE_ZERO]);
            array_push($tmp_result_copy, $aValues[self::VALUE_ONE]);
           
        }

        $tmp_result_copy = implode('', $tmp_result_copy);
        return var_dump($tmp_result_copy); 
    }
}

CopyCharacter::makeCopyStr("program");