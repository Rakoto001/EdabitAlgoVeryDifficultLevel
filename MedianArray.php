<?php

class MedianArray
{
    /**
     * Given two sorted arrays nums1 and nums2 of size m and n respectively
     * return the median of the two sorted arrays.
     *
     * @param [type] $_aNums1
     * @param [type] $_aNums2
     * @return void
     */
    public static function findMedianSortedArrays($_aNums1, $_aNums2)
    {
        
        $newarray = array_merge($_aNums1, $_aNums2);
        sort($newarray);
        $sumLenth = count($newarray);
        if (self::checkPair($sumLenth)) {
            $tmp_medium2 = $sumLenth/2;
            $tmp_medium1 = $tmp_medium2 - 1;
            $newMedium   = ($newarray[$tmp_medium1] + $newarray[$tmp_medium2])/2;

            return $newMedium;
        } else {
            $tmp_medium = floor($sumLenth/2); //Arrondit à l'entier inférieur
            $newMedium   = $newarray[$tmp_medium];

            return $newMedium;
        }

        return null;
        
    }

    /**
     * check  even or odd
     *
     * @param integer $_numbers
     * @return void
     */
    public static  function checkPair(int $_numbers)
    {
        if ((($_numbers)%2 == 0)) { // nombre paire

            return true;
        } else { //nombre impair

            return false;
        }
    }
}

MedianArray::findMedianSortedArrays([4,2], [3]);