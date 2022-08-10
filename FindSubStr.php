<?php
/** 
 * link : https://leetcode.com/problems/substring-with-concatenation-of-all-words/
 * 
 * You are given a string s and an array of strings words of the same length.
 *  Return all starting indices of substring(s) in s that is a concatenation of each word in words exactly once,
 *  in any order, and without any intervening characters.
 */
class FindSubStr
{

    /**
     * 
     *
     * @param [type] $_inputWords
     * @param [type] $_aTemplateWords
     * @return array
     */
    public static function findSubString($_inputWords, $_aTemplateWords) : array
    {
     
        $aReplacetTemplates = self::arrangeWords($_aTemplateWords);
        $aResults[]         = array_map(function($templatewords) use ($_inputWords) {
        
            return  (strpos($_inputWords, $templatewords));
        }, $aReplacetTemplates);

        var_dump($aResults);// resultat final

        return $aResults;
    }


    /**
     * arrange words by subsitution
     *
     * @param [type] $_aTemplateWords
     * @return array
     */
    public static function arrangeWords($_aTemplateWords) : array
    {

        $lenth = count($_aTemplateWords);
        $tmp_merge_by_index = [];
        $aReplacetTemplates = [];
        
        for($index = 0; $index<$lenth; $index++){

            for($indexToSubstitute = $index + 1; $indexToSubstitute<$lenth; $indexToSubstitute++){
                // substitution de deux index
                $tmp_merge_by_index[$indexToSubstitute] = $_aTemplateWords[$index];
                $tmp_merge_by_index[$index]             = $_aTemplateWords[$indexToSubstitute];
               
                $aReplacetTemplates[] = implode('',array_replace($_aTemplateWords, $tmp_merge_by_index));
                $tmp_merge_by_index   = []; //initialisation de l'array

            }

        }
        // combiner avec le template d'origine:
        $aReplacetTemplates = array_merge($aReplacetTemplates, [implode('', $_aTemplateWords)]);

        return $aReplacetTemplates;
    }

}

FindSubStr::findSubString("barfoothefoobarman",["foo"]);