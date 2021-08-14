<?php
class Dakti{


  /**
   *  organize the words based on the numbers they have, 
   * then delete the numbers once they are organized
   */
    public static function arrangeWordsByNumber(string $_paramsWords)
    {
        $arrayWords = explode(' ',$_paramsWords);
        foreach($arrayWords as $key => $words){
            $number = (int) filter_var($words, FILTER_SANITIZE_NUMBER_INT);
            $tmp_arrange[$number] = $words; 
        }
        ksort($tmp_arrange);
        foreach($tmp_arrange as $key => $words){
           $tmp_letters[] = Dakti::removeInt($words);
        }
        var_dump($tmp_letters);

        return $tmp_arrange;

    }

    /**
     * remove the int to the given letters
     */
    public function removeInt(string $_paramsLetters)
    {
        $tmp_words = str_split($_paramsLetters);
        foreach($tmp_words as $value){
            if (filter_var($value, FILTER_VALIDATE_INT)) {

            } else {
                $tmp_new_words[] = $value;
            }
        }
        $newLetters = implode('',$tmp_new_words);
    
        return $newLetters;
    }
}


// test algo
$phrases = 'i2s thi1s a3 t4est';

Dakti::arrangeWordsByNumber($phrases);