<?php
/** source problem : https://leetcode.com/problems/best-time-to-buy-and-sell-stock/ */

/**
 * DESCRIPTION 
 * You are given an array prices where prices[i] is the price of a given stock on the ith day.

* You want to maximize your profit by choosing a single day to buy one stock and choosing a different day in the future to sell that stock.

* Return the maximum profit you can achieve from this transaction. If you cannot achieve any profit, return 0.
 */


class MaxProfit{

    /**
     * prends le max profit dans une plage de vente donnée
     *
     * @param array $_prices
     * @return void
     */
    public static function getMaxProfit(array $_prices)
    {
        $isDataReal = self::checkIfDataIsReal($_prices);
       
        if ($isDataReal == 1) { // contient seulement des integer donc on peut calculer le maxProfit

        $isNullProfit = self::isNullProfit($_prices); 

        if ($isNullProfit) {
            echo 'sans profit 0';
            // sans profit
            return 0;
        } else {
            self::findDateProfit($_prices);
        }

        } else {

            throw new Exception('les input doivent etre des nombres entiers');
        }

        
        
    }

    /**
     * tester si chaque valeur est un entier ou non
     *
     * @param array $_prices
     * @return void
     */
    public static function checkIfDataIsReal(array $_prices)
    {

        $valuePrice = array_map(function($price){
            if (!filter_var($price, FILTER_VALIDATE_INT)) {

                return false;
            } else {

                return true;
            }
        }, $_prices);

        $isFalse  = array_search(false, $valuePrice);

        if ($isFalse == false ) { // si false alors price contient seulement des integer values

            return 1;
        }

        return 0;
    }

    /**
     * prendre les date min et max profit afin de relever le profit max dans une plage donnée
     * toujourd acheter avant de vendre
     *
     * @param [type] $_prices
     * @return void
     */
    public static function findDateProfit($_prices)
    {
        $filtredPrice  = self::findMaxMinPrice($_prices);
        $indexMaxPrice = array_search($filtredPrice['max'], $_prices);
        $indexMinPrice = array_search($filtredPrice['min'], $_prices);

        if ($indexMaxPrice > $indexMinPrice) {
            
            $resultMaxProfit = $_prices[$indexMaxPrice] - $_prices[$indexMinPrice];
            var_dump($resultMaxProfit);

            return $resultMaxProfit;


        } else {
            unset($_prices[$indexMaxPrice]);
            
            return self::findDateProfit($_prices);
        }



    }

 
    /**
     * chercher le prix Min et prix Max
     *
     * @param array $_prices
     * @return array
     */
    public static function findMaxMinPrice(array $_prices): array
    {

        return [
                    'max' => max($_prices),
                    'min' => min($_prices),
        ];

    }

    /**
     * checker si profit existe dans le 
     *
     * @param array $_prices
     * @return boolean
     */
    public static function isNullProfit(array $_prices) : bool
    {
        $copyPrice = $_prices;
        rsort($_prices);
        rsort($_prices);
        if ( implode('', $_prices) == implode('', $copyPrice)) {

            return true;
        }

       return false;
        
    }
}

// MaxProfit::getMaxProfit(['fds', 'r', 't']);
MaxProfit::getMaxProfit([7,1,5,3,6,4]);