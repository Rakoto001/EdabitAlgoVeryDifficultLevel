<?php
class HotSpotWifi
{
    /**
     * DESCRIPTION OF THE PROBLEM
     * 
     * 
     * A new 'hacky' phone is launched, which has the feature of connecting to any Wi-Fi network from any distance away,
     *  as long as there aren't any obstructions between the hotspot and the phone. Given a string, 
     * return how many Wi-Fi hotspots I'm able to connect to.
     */


    /**
     * The phone is represented as a P.
     * A hotspot is represented as an *.
     * An obstruction is represented as a #. You cannot access a hotspot if they are behind one of these obstructions.
     */





    /**
     * check the wifi disponible to the environment
     */
    public static function checkWifi($_parametters)
    {
        $wifi = 0;
        // remplace les espaces par un simple ''
        $newParams = preg_replace('/\s+/', '', $_parametters);
        $arrayValues = str_split($newParams);
        // var_dump($arrayValues);
        $pKey = array_search('P', $arrayValues);
        $lenth = count($arrayValues);
       
        $wifiRightNumber = HotSpotWifi::checkRightWifi($arrayValues, $lenth, $pKey, $wifi);
        $wifiLeftNumber = HotSpotWifi::checkLeftWifi($arrayValues, $pKey, $wifi);
        $disponibleWIfi = $wifiRightNumber + $wifiLeftNumber;
        echo $disponibleWIfi;

        return $disponibleWIfi;
    }

    /**
     * check the wifi disponible to the rigth side
     */
    public static function checkRightWifi($_arrayValues, $_lenth, $_pKey, $_wifi)
    {
        while ($_pKey != $_lenth-1) {
            $_pKey++;
            if ($_arrayValues[$_pKey] == '#') {
            break;
            } elseif ($_arrayValues[$_pKey] == '*') {
                $_wifi++;
            }
        }

        return $_wifi;
    }

    /**
     * check all wifi to the left side 
     */
    public static function checkLeftWifi($_arrayValues, $_pKey, $_wifi)
    {
        while ($_pKey != 0){
            $_pKey--;
            if ($_arrayValues[$_pKey] == '#') {
            break;

            } elseif ($_arrayValues[$_pKey] == '*') {
                $_wifi++;
            }
        }

        return $_wifi;
    }
}

$value = "  *#**** P  *#  * # * ";
HotSpotWifi::checkWifi($value);