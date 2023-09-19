<?php


class FactorTree{

    private array $accumulationDivisor;

    public function __construct() {
        $this->accumulationDivisor = [];
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
            var_dump($completeFactorTreeResults);

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

$factorTree = new FactorTree();
$factorTree->makeFactorTreeCalculation(525);