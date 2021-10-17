
<?php

class PascalsTriangle
{

    /**
     * get the Pascals Triangle with given params number
     */
    public static function givePascalTriangle(int $pyramid)
    {
        if ($pyramid >= 29) {
            throw new Exception('Limite du triangle de Pascal atteinte');

        }
        $realPyramid = self::makePascalsTriangle([1,1], $pyramid);

        var_dump($realPyramid);

        return $realPyramid;
        
    }


    /**
     * make Pascals Triangle
     * 
     * return array
     */
    public static function makePascalsTriangle(array $pyramidValue, int $paramsNumber)
    {
        for ($ligne=0; $ligne < count($pyramidValue)-1; $ligne++) { 
            $tmp_triangleValue[] = $pyramidValue[$ligne] + $pyramidValue[$ligne+1];
        }
        $tmp_triangleValue = str_split('1'.implode($tmp_triangleValue).'1');

        //decrémentation de $paramsNumber pour avoir la limite du triangle
        $paramsNumber--;

        if($paramsNumber == 0) {

            return $tmp_triangleValue;
        } else {
            self::makePascalsTriangle($tmp_triangleValue, $paramsNumber);
        }

        
    }
}
PascalsTriangle::givePascalTriangle(33);