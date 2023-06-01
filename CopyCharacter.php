<?php


class CopyCharacter
{
    const VALUE_ONE   = 1;
    const VALUE_ZERO  = 0;


    /**
     * copy the str 
     *
     * @param [type] $_params
     * @return void
     */
    public static function makeCopyStr(string $_params) :string
    {
        $aParams = str_split($_params);
       
        $resultCopied = CopyCharacter::searchMinIndex($aParams);

        var_dump($resultCopied);

        return $resultCopied;
    }

    /**
     * take the index accordig to the length of string input
     *
     * @param array $aParams
     * @param integer $count
     * @return string
     */
    public static function searchMinIndex(array $aParams, $count = 0) :string
    {
        $tmp_two_value = [];
        $tmp_results = [];

        if( is_array($aParams) && count($aParams) >= 2 ){


        $tmp_two_value = array_push($tmp_two_value, $aParams[self::VALUE_ZERO]).
        $tmp_two_value = array_push($tmp_two_value, $aParams[self::VALUE_ONE]).

        $tmp_results = CopyCharacter::copyCHaracters($tmp_two_value);

        } elseif( count($aParams) <=  1) {

        $tmp_results =  implode('', $aParams);

        }

        return $tmp_results;
    }


    /**
     * make copy operation
     *
     * @param array $aValues
     * @return string
     */
    public static function copyCHaracters(array $aValues) :string
    {
        $tmp_result_copy = [];

        for($numRelatedCopy = 0; $numRelatedCopy < 4; $numRelatedCopy++){
            
            array_push($tmp_result_copy, $aValues[self::VALUE_ZERO]);
            array_push($tmp_result_copy, $aValues[self::VALUE_ONE]);
           
        }

        $tmp_result_copy = implode('', $tmp_result_copy);

        return ($tmp_result_copy); 
    }
}

CopyCharacter::makeCopyStr("J S");