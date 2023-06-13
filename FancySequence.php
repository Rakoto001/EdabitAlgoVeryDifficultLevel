<?php
/** https://leetcode.com/problems/fancy-sequence/description/ */



class FancySequence
{
    const BEGIN_INDEX = 0;
    private $aResults;
    private $tmpresults;

    public function __construct() {
        $this->aResults = [];
        $this->tmpresults = [];
    }


    /**
     * an API that generates fancy sequences using the append, addAll, and multAll operations.
     *
     * @param array $successiveFunctions
     * @param array $allInputValues
     * @return array
     */
    public function checkSuccession(array $successiveFunctions, array $allInputValues) : array
    {

        $sequenceResult = null;

        $finalResults = array_map(function ($inputValue, $nameFunction) use ($sequenceResult) {
           

            $sequenceResult = $this->$nameFunction($inputValue[self::BEGIN_INDEX]);
            return $sequenceResult;

        }
        ,$allInputValues,  $successiveFunctions);

        var_dump($finalResults);

        return $finalResults;
        
    }
    

    /**
     * Appends an integer val to the end of the sequence
     *
     * @param integer $valueInput
     * @return void
     */
    public function append(int $valueInput) :void
    {
        $this->aResults[] = $valueInput;
        $this->aResults;
    }


    /**
     * Increments all existing values in the sequence by an integer inc
     *
     * @param integer $valueInput
     * @return void
     */
    public function addAll(int $valueInput) :void
    {

        $this->aResults = array_map(function($value) use ($valueInput)
         {
            return $value + $valueInput;
        }, $this->aResults);

        
         $this->aResults;
    }


    /**
     *  Multiplies all existing values in the sequence by an integer m
     *
     * @param integer $valueInput
     * @return void
     */
    public function multAll(int $valueInput) :void
    {
        $this->aResults = array_map(function($value) use ($valueInput)
        {
           return $value * $valueInput;
       }, $this->aResults);

        $this->aResults;
    }



    /**
     *  Gets the current value at index idx (0-indexed) of the sequence modulo 109 + 7.
     *  If the index is greater or equal than the length of the sequence, return -1.
     * @param integer $valueInput
     * @return integer
     */
    public function getIndex(int $valueInput) : int
    {
        
        $this->tmpresults = $this->aResults[$valueInput];

        return $this->tmpresults ;
    }
}


$functionSuccessions = [ "append", "addAll", "append", "multAll", "getIndex", "addAll", "append", "multAll", "getIndex","getIndex", "getIndex" ];
$allInputValues = [[2], [3], [7], [2], [0], [3], [10], [2], [0], [1], [2]];

$sequence = new FancySequence();
$sequence->checkSuccession($functionSuccessions, $allInputValues);