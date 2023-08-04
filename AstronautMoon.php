<?php
/** link : https://www.hackerrank.com/challenges/dynamic-programming-classics-the-longest-common-subsequence/problem?isFullScreen=true */

class AstronautMoon
{
    private array $resultCombinaisonAstronaut;
    public function __construct() {
        $this->resultCombinaisonAstronaut = [];
    }

    /**
     * Undocumented function
     *
     * @param integer $numberAstronaut
     * @param array $astronautPairIds
     * @return array
     */
    public function constructAstronautMembers(int $numberAstronaut, array $astronautPairIds) :array
    {
        $aResults = [];
        $tmp_results = [];
        $combinaisonsAstronauts = [];

        if ( is_array($astronautPairIds) ) {
            $currentPairAstrId = current($astronautPairIds);
            $copyastronautPairIds = $astronautPairIds;
            array_shift($astronautPairIds);
            
            foreach ($astronautPairIds as $key => $sameAstronautCountry) {
               
                $this->arrangeAstronautWithDiffCountry($sameAstronautCountry, $currentPairAstrId);
            }
            
            $combinaisonsAstronauts = $this->resultCombinaisonAstronaut;
            $astronautPairIds = $this->changeContentType($copyastronautPairIds);
         
            $combinaisonsAstronauts = array_merge($combinaisonsAstronauts, $astronautPairIds);
            $tmp_results = (array_unique($combinaisonsAstronauts));
            var_dump($tmp_results);
            $aResults = $tmp_results; 


            return $aResults; 

        }

        
    }


    /**
     * Undocumented function
     *
     * @param array $combinaisonsAstronauts
     * @return array
     */
    public function changeContentType(array $combinaisonsAstronauts) :array
    {
        $aResults = [];

        $aResults = array_map(function($dualAstronauts){
          
            return ($dualAstronauts[0]).($dualAstronauts[1]);
        }, $combinaisonsAstronauts);

        return $aResults;
    }


    /**
     * Undocumented function
     *
     * @param array $sameAstronautCountry
     * @param array $currentPairAstrId
     * @return boolean
     */
    public function arrangeAstronautWithDiffCountry(array $sameAstronautCountry, array $currentPairAstrId) :bool
    {

        for ($firstAstronaut = 0; $firstAstronaut < count($currentPairAstrId); $firstAstronaut++) {
            for ($secondeAstronaut=0; $secondeAstronaut < count($currentPairAstrId) ; $secondeAstronaut++) { 
               
                $this->resultCombinaisonAstronaut[] = ($currentPairAstrId[$firstAstronaut]. $sameAstronautCountry[$secondeAstronaut]);
              
            } 
        }
     
        return true;
    }
    


    
  
}

$oAstronaut = new AstronautMoon();

$oAstronaut->constructAstronautMembers(5, [[0,1], [2,3], [0,4]]);