<?php 



// link https://edabit.com/challenge/JW6ZFajHbyH6wh5Bf => 

class LeastCommonMultiple
{

    public array $commonValue;
    private array $accumulationDivisor;
    private array $indexToDeleteDataFactorToCompare;


    public function __construct() {
        $this->commonValue = [];
        $this->accumulationDivisor = [];
        $this->indexToDeleteDataFactorToCompare = [];
    }



    public function makeLeastCommonMultiple(array $aInputNumbers)
    {
        $tmp_results_factor_tree = [];

        foreach ($aInputNumbers as $key => $inputNumber) {
            $tmp_results_factor_tree[] = $this->makeFactorTreeCalculation($inputNumber);
        }

        // var_dump($tmp_results_factor_tree);
        // die;
        $this->searchLeastCommonMultiple($tmp_results_factor_tree);
        
        die;
        
    }



    public function searchLongestFactorTree(array $datasFactorTree)
    {
        $tmp_asssoc_key_cout = [];

        foreach ($datasFactorTree as $key => $tree) {
            $tmp_asssoc_key_cout [] = count($tree);

        }

        var_dump(max($tmp_asssoc_key_cout));
        die;
    }


    public function searchLeastCommonMultiple(array $datasFactorTree)
    {

        // $datasFactorTree = [[3,5,5, 7], [2, 3, 3,5,5]];
        $results = null;

        var_dump($datasFactorTree);
        $this->searchLongestFactorTree($datasFactorTree);
        die;

        if (count($datasFactorTree) > 0) {

            //  pour voir les array plus longue --- encore a terminer
            // $indexFactorTree = $this->searchLongestParams($datasFactorTree);
            $referenceFactorTree = $datasFactorTree[1];
            $dataFactorToCompare = $datasFactorTree[0];

            foreach ($referenceFactorTree as $key => $valueToCompare) {

                // $dataFactorToCompare = (implode('', $dataFactorToCompare));
                // $dataFactorToCompare = str_split($dataFactorToCompare);

                // // changement des string en int
                // $dataFactorToCompare = array_map(function($value){

                //     return intval($value);

                // }, $dataFactorToCompare);

                $indexSearchedValue = array_search($valueToCompare, $dataFactorToCompare);
              
                
                if (($indexSearchedValue === 0 || $indexSearchedValue != false)) {

                    array_push($this->commonValue, $dataFactorToCompare[$indexSearchedValue]); 

                    //suppression de la valeure dans l'array qui est a chercher
                    unset($dataFactorToCompare[$indexSearchedValue]);
                    //suppression de la valeure dans le key de la référence
                    unset($referenceFactorTree[$key]);


                }
            }
            var_dump($dataFactorToCompare);
            var_dump($referenceFactorTree);
            var_dump($this->commonValue);

           $mergedFactorTree =  array_merge($this->commonValue, $dataFactorToCompare, $referenceFactorTree);
           
           $results = array_product($mergedFactorTree);
           var_dump($results);
            die;
        }
        
    }


    public function searchLongestParams(array $datasFactorTree)
    {

        // foreach ($variable as $key => $value) {
        //     # code...
        // }
        
    }


      /**
     * calcul arbre des facteurs
     *
     * @param [type] $inputDividend
     * @param integer $divisor
     * @return void
     */
    public function makeFactorTreeCalculation(int $inputDividend, int $divisor = 2)
    {
        $tmp_quotient = 0;
        $completeFactorTreeResults = [];

        $tmp_quotient = $inputDividend/$divisor;
       
        if ($inputDividend == $divisor) {

            $completeFactorTreeResults = $this->arrageResultFactorTree($inputDividend);

            return $completeFactorTreeResults;
        }

        if (filter_var($tmp_quotient, FILTER_VALIDATE_INT)) {
            $this->accumulationDivisor[] = $divisor;

            // cas ou apres plusieurs boucles, $divisor > 2 donc on initialise divisor à 2 
            // dans la condition  ou tmp_quotient est integer
            return $this->makeFactorTreeCalculation($tmp_quotient, $divisor = 2);
        
        } else {

            return $this->makeFactorTreeCalculation($inputDividend, $divisor+1);
        }
        
    }


    /**
     * combiner les resultats dans inputDividend et dans le resultat temporaire
     *
     * @param integer $inputDividend
     * @return array
     */
    public function arrageResultFactorTree(int $inputDividend) :array
    {
        $accumulationDivisor = [];

        if (($this->accumulationDivisor)) {
            array_push($this->accumulationDivisor, $inputDividend);
            $accumulationDivisor = $this->accumulationDivisor;
            $this->accumulationDivisor = [];

        } else {

            array_push($accumulationDivisor, $inputDividend);
        }

        return ($accumulationDivisor);
        
    }




}



$common = new LeastCommonMultiple();

$common->makeLeastCommonMultiple([525, 450]);