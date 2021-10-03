<?php

class DepthNesting
{

    const OPEN_LEFT_BRAHCE   = '[';
    const RIGHT_BRANCHE      = ',';
    const CLOSE_LEFT_BRANCHE = ']';

    /**
     * nest a flat array to represent an incremental depth level sequence.
     */
    public static function incrementalDepth(array $_numberParams)
    {
        $lenth = count($_numberParams);
        // echo $lenth;

        foreach ($_numberParams as $key => $number) {
            $lenth --;
            // echo $lenth;
            // echo '<br>';
            $tmp_close_branch [] = self::CLOSE_LEFT_BRANCHE; 

            $tmp_depth_result [] = self::makeDepthNesting($number, $lenth);
        }
        var_dump(implode(' ',$tmp_depth_result).implode($tmp_close_branch));

        return implode(' ',$tmp_depth_result).implode($tmp_close_branch);
        
    }


    /**
     * put left and rigth flag branch for each value
     */
    public static function makeDepthNesting($_number, int $_lenth)
    {
       
        if ($_lenth == 0) {
            
           return  $tmp_depth = self::OPEN_LEFT_BRAHCE.$_number;
        } else {

           return  $tmp_depth_left = self::OPEN_LEFT_BRAHCE.$_number.self::RIGHT_BRANCHE;
        }
        
    }

}
$aNumbers = ["dog", "cat", "cow"];
// $aNumb = [1, 2, 3, 4, 5];

DepthNesting::incrementalDepth($aNumbers);