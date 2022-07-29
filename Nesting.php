<?php

class Nesting{

    /**
     * nest a flat array to represent an incremental depth level sequence.
     *
     * @param [type] $_aInputs
     * @return string
     */
    public static  function  makeDeepthNest($_aInputs) :string
    {

        if (count($_aInputs)>0) {

            $realValues = array_map(function($numbers){

                return  '['.$numbers.',';
             }, $_aInputs);
     
             $brackets = array_map(function($closed){
     
                 return ']';
             }, $_aInputs);
     
             $results = array_merge($realValues, $brackets);

             return $results;
        }
       

        return '';

    }
}
Nesting::makeDeepthNest([1, 2, 3, 4, 5]);