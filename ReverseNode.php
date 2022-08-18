
<?php
/**
 * @author [Dãn RAKOTOARISON]
 * @email [rakotoarisondan@mail.com]
 * @create date 2022-08-18 14:34:09
 * @modify date 2022-08-18 14:34:09
 */

class ReverseNode{

    // subject in: https://leetcode.com/problems/reverse-nodes-in-k-group/

    /**
     * Given the head of a linked list, reverse the nodes of the list k at a time, and return the modified list.
     * k is a positive integer and is less than or equal to the length of the linked list. If the number of nodes is not a multiple of k then left-out nodes, in the end, should remain as it is.
     * You may not alter the values in the list's nodes, only nodes themselves may be changed.
     */


     
    /**
     * Reverse Nodes in k-Group
     *
     * @param [type] $_head
     * @param [type] $_k
     * @return array
     */
    public static function makeReverseNode($_head, $_k): array
    {
        $tmp_chunked_array = array_chunk($_head, $_k);
        // renverser le tableau par $k nombre seulement si la taille est égale à $k elle m$eme
        $tmp_nodes = array_map(function($head) use ($_k){
            $arrange_nodes = [];
            if (count($head) == $_k) {
                $arrange_nodes = array_reverse($head);
            } else {
                $arrange_nodes = $head;
            }

            return $arrange_nodes;
        }, $tmp_chunked_array);
  
        // arranger le tableau
        foreach ($tmp_nodes as $key => $nodes) {
            $tmp_node_results[] = implode('', $nodes);;
        }

        $resultsNodes = str_split(implode('', $tmp_node_results));
        var_dump(($resultsNodes));

        return $resultsNodes;
    }

}

ReverseNode::makeReverseNode([1,2,3,4,5], 2);
/**
 *     $resultsNodes = explode('', implode('', $tmp_node_results));
  *      var_dump($resultsNodes);
 */