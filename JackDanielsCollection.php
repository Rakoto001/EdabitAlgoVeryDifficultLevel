<?php


/** link  https://www.hackerrank.com/challenges/morgan-and-a-string/problem?isFullScreen=true */



class JackDanielsCollection
{
    private array $tmp_value_collections;
    private array $winnerLetter;

    public function __construct() {
        $this->tmp_value_collections = []; //
        $this->winnerLetter = []; //winnerLetter
    }


    /**
     *  lexicographically minimal of Jack Daniel Collecion
     *
     * @param array $jLettersCollections
     * @param array $dLettersCollections
     * @return array
     */
    public function lexicographicallyMinimalString(array $jLettersCollections, array $dLettersCollections) :array
    {

        $aFinalCollectionResults = [];
        $atmp_chosen_combinaison = [];

        $atmp_chosen_combinaison = $this->makeChoseOperation($jLettersCollections, $dLettersCollections);
        
        if ( count($atmp_chosen_combinaison['jack']) == 0 || count($atmp_chosen_combinaison['daniels']) == 0) {
            $aFinalCollectionResults = array_merge($this->winnerLetter, $atmp_chosen_combinaison['jack'],$atmp_chosen_combinaison['daniels']);
            var_dump($aFinalCollectionResults);

            return $aFinalCollectionResults;
        }

        return $this->lexicographicallyMinimalString($atmp_chosen_combinaison['jack'], $atmp_chosen_combinaison['daniels']);


    }


    /**
     * sequence of choose
     *
     * @param array $jLettersCollections
     * @param array $dLettersCollections
     * @return array
     */
    public function makeChoseOperation(array $jLettersCollections, array $dLettersCollections) :array
    {
        $restOfWinnerLetters = [];

        $jFirstLetter = current($jLettersCollections);
        $dFirstLetter = current($dLettersCollections);
       
        if ($jFirstLetter < $dFirstLetter) {
            // cas 'JACK WINNER
            $restOfWinnerLetters['jack'] = array_slice($jLettersCollections, 1);
            array_push($this->winnerLetter, $jFirstLetter);
            $restOfWinnerLetters['daniels'] = $dLettersCollections;
        } else {
            // cas 'DANIEL WINNER
            $restOfWinnerLetters['daniels'] = array_slice($dLettersCollections, 1);
            array_push( $this->winnerLetter,  $dFirstLetter);
            $restOfWinnerLetters['jack'] = $jLettersCollections;
        }
        
        return $restOfWinnerLetters;
    }
}

$collection = new JackDanielsCollection();
$collection->lexicographicallyMinimalString( ["J", "A", "C", "k"], ["D", "A", "N","I","E","L"]);