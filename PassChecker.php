<?php

/** https://leetcode.com/problems/strong-password-checker/ */



class PassChecker
{
    const MIN_CHAR = 'Le caractère min est de 6';
    const MAX_CHAR = 'Le caractère max est de 12';
    const UPPER_CHAR = 'Le caractère doit contenur au moins une chane en majuscule';
    const LOWER_CHAR = 'Le caractère doit contenur au moins une chane en miniscule';
    const REPEATED_CHAR = 'Le caractère contient 3 rététitions de chaine succéssive';

    private $errorCount;

    public function __construct() {
        $this->errorCount = 0;
        $this->errorMessage = [];
    }


    /**
     * Make strong password by multiple condiction
     *
     * @param string $passParams
     * @return boolean
     */
    public function strongPassMaker(string $passParams) :bool
    {
        $results = [];

        $this->checkMinMaxChar($passParams);
        $this->checkUpLowStr($passParams);
        $this->repeatValidation($passParams);
      

        if ($this->errorCount > 0) {
            // die('fin');
            $results = [
                'errCount' => $this->errorCount,
                'errorMessages' => $this->errorMessage
            ];

            var_dump($results);
            return 1;
        }

        echo 'success';
        return  0;
    }

    /**
     * check content lower and uppercase
     *
     * @param string $passParams
     * @return boolean
     */
    public function checkUpLowStr(string $passParams) :bool
    {
        // si tous en maj => error
        if (ctype_upper($passParams)) {
            $this->errorMessage [] =  self::LOWER_CHAR;
            // echo self::LOWER_CHAR;

             $this->errorCount ++;
            return false;

        // si tous en min => error
        } elseif(ctype_lower($passParams)) {
            $this->errorMessage [] =  self::UPPER_CHAR;
            // echo self::UPPER_CHAR;

            $this->errorCount ++;
            return false;
        }

        return 0;

    }

    
    /**
     * restrict min and max var
     *
     * @param string $passParams
     * @return boolean
     */
    public function checkMinMaxChar(string $passParams) :bool
    {
        $aPassParams = str_split($passParams);

        if (count( $aPassParams) < 6) {
            $this->errorMessage [] =  self::MIN_CHAR;

            // echo self::MIN_CHAR;
             $this->errorCount ++;

            return false;

        } elseif( count( $aPassParams) > 12) {
            $this->errorMessage [] = self::MAX_CHAR;

            // echo self::MAX_CHAR;

            $this->errorCount ++;
            return false;

        }


        return true;
    }

    public function repeatValidation(string $passParams) :bool
    {
        $aPassParams = str_split($passParams);

            for ($indexCurrent=0; $indexCurrent < count($aPassParams)-2  ; $indexCurrent++) { 

                if ( (strtolower($aPassParams[$indexCurrent]) == strtolower($aPassParams[$indexCurrent+1]) ) 
                         && 
                         strtolower($aPassParams[$indexCurrent+1]) == strtolower($aPassParams[$indexCurrent+2]) ) {
                            $this->errorMessage [] =  (self::REPEATED_CHAR);

                            // echo self::REPEATED_CHAR;
                            $this->errorCount ++;
                   
                    return false;
           }
            
        }

        
        return true;

    }

   

}



$myPass = new PassChecker();

$myPass->strongPassMaker('ccE10qsd!');