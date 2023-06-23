<?php

// https://leetcode.com/problems/make-array-empty/ 

/**
 * description :
 * You are given an integer array nums containing distinct numbers, 
 * and you can perform the following operations until the array is empty:

 * If the first element has the smallest value, remove it
 * Otherwise, put the first element at the end of the array.
 * Return an integer denoting the number of operations it takes to make nums empty.
 */




class OperationsToEmptyArray
{
    public function __construct()
    {
        $this->necessaryOperation = 0;
    }

    //     Si le premier élément a la plus petite valeur, supprimez-le
    // Sinon, placez le premier élément à la fin du tableau.

 
    /**
     * perform the following operations until the array is empty
     *
     * @param array $aParametters
     * @return integer
     */
    public function makeEmptyArray(array $aParametters) :int
    {
        $result = null;

        $content = $this->validateArrayContent($aParametters);

        if ($content) {

            $minVal = min($aParametters);

            if (count($aParametters) > 0) {

                if ($minVal < current($aParametters)) {
                    // opération pour shift la première val en last val 
                    $currentValue = array_shift($aParametters);
                    array_push($aParametters, $currentValue);
                } elseif ($minVal >= current($aParametters)) {

                    unset($aParametters[0]);
                }
            }

            $this->necessaryOperation++;

            if (count($aParametters) > 0) {
                $aParametters = implode('', $aParametters);

                return $this->makeEmptyArray(str_split($aParametters));
            }

            $result = $this->necessaryOperation;
            
        } else {
            
            $result = false;
        }

        var_dump($result);

        return $result;
    }

    /**
     * checker le contenu de l'array
     *
     * @param array $aNumber
     * @return bool
     */
    public function validateArrayContent(array $aNumber): bool
    {
        $aChecked = array_map(function ($num) {
            if (is_numeric($num)) {

                return $num;
            } else {

                return false;
            }
        }, $aNumber);

        $isNumber = array_search(false, $aChecked);

        if (is_numeric($isNumber)) {

            // return false si existe autre que integer
            return false;
        }

        return true;
    }
}

$operation = new OperationsToEmptyArray();
$operation->makeEmptyArray([1, 2, '7', "8"]);
