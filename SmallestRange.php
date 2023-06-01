<?php
class SmallestRange
{

    /** link :  https://leetcode.com/problems/smallest-range-covering-elements-from-k-lists/
     * 
     */



     
    public static function searchSmallestRange(array $_params)
    {
        $results = [];

       

        $combinedArray = SmallestRange::combineArray($_params);
        $allDifferenceParametters = SmallestRange::getAllDifference($combinedArray);
        $containRange = SmallestRange::isRange($allDifferenceParametters, $_params);


        // return $resuels;
        
    }

    /**
     * Undocumented function
     *
     * @param [type] $allDifferenceParametters
     * @param [type] $originalParams
     * @return boolean
     */
    public static function isRange($allDifferenceParametters, $originalParams) :bool
    {
        // la groupe qui a une diff min
        $minValueCombinaison = min(($allDifferenceParametters['allCOmbinaisons'][$allDifferenceParametters['basicMinVal']]));
        $maxValueCombinaison = max(($allDifferenceParametters['allCOmbinaisons'][$allDifferenceParametters['basicMinVal']]));

        
        var_dump($minValueCombinaison);
        var_dump($maxValueCombinaison);

        foreach ($originalParams as $key => $aComparaison) {

            // si (min($aComparaison) sup à min value et maxCOmbinaison inférieur à combinaison alors les conditions ne sont pas remplies ==> return false
            if ( (min($aComparaison) >= $minValueCombinaison) ) {
               echo ('les nombres ne sont pas comprises entre la valeure min et max de la plage donnée');

               return false;
            }

        }

        
        return true;
    }

    /**
     * prendre les différences entre deux nombres de inputParams, et ne considerer que la min diff
     *
     * @param array $inputParams
     * @return array
     */
    public static function getAllDifference(array $inputParams) :array
    {
        $allCOmbinaisons = [];
        $Combinaisons    = [];
        $tmp_merge       = [];

        $basicMinVal = 1000;

        for($currentIndex = 0; $currentIndex < count($inputParams); $currentIndex++){

            for ($nextIndex = $currentIndex+1; $nextIndex < count($inputParams) -1 ; $nextIndex++) { 

                $difference = $inputParams[$currentIndex] - $inputParams[$nextIndex];
                $absDiff = (abs($difference));
                $tmp_merge []= $inputParams[$currentIndex]; 
                $tmp_merge []= $inputParams[$nextIndex]; 

                // array_push($tmp_merge, $inputParams[$currentIndex], $inputParams[$nextIndex]);
                $allCOmbinaisons[$absDiff] = array_merge([], $tmp_merge);
                // reinitialisation de tmp_merge
                $tmp_merge = [];
                // stoker dans le tableau l'index qui représente la diff et la value=> les deux chiffres

                // recherhce de la diff minimum
                if ($absDiff < $basicMinVal) {
                    $basicMinVal = $absDiff;
                }

            }
        

        }

        

        return $Combinaisons = [

            'allCOmbinaisons' => $allCOmbinaisons,
            'basicMinVal'     => $basicMinVal

                            ];

    }


    /**
     * combine all array input
     *
     * @param [type] $_params
     * @return array
     */
    public static function combineArray($_params): array
    {
           $combinedArray = [];

           if ( count($_params) > 0 ) {
            foreach ($_params as $key => $aSingle) {
                $combinedArray = array_merge($combinedArray, $aSingle);
            }
        }


        return $combinedArray;
    }
}

SmallestRange::searchSmallestRange([[1,2,3],[1,2,3],[1,2,3]]);