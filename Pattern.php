<?php
class Pattern
{
    /**
     * DESCRITPION OF THE CHALLENGE
     * The ABACABA pattern is a recursive fractal pattern that shows up in many 
     * places in the real world (such as in geometry, art, music, poetry, 
     * number systems, literature and higher dimensions).
     */



    /**
     * make the ABACABA Pattern
     */
    public static function makePatterns($number, $count = null, $_result = null)
    {
        $letter = 'A';
        for($index = 1; $index<27; $index++){
                $patterns[$index] = $letter++;
        }
        if ($number != 0) {
            if ($count == null){            
                $count = 1;
            }
            $newPattern = $_result . $patterns[$count] . $_result;
            $number --;
            $count++;
             Pattern::makePatterns($number, $count, $newPattern);
        }
         var_dump($_result);
    }
}

// test algo
Pattern::makePatterns(5);