<?php 

// link : https://www.hackerrank.com/challenges/xor-se/problem?isFullScreen=true

//*********** DESCRIPTIONS ******************/
// Complete the xorSequence function in the editor below. It should return the integer value calculated.

// xorSequence has the following parameter(s):

// l: the lower index of the range to sum
// r: the higher index of the range to sum
// Input Format

// The first line contains an integer , the number of questions.
// Each of the next  lines contains two space-separated integers,  and , the inclusive left and right indexes of the segment to query.



class XorSequenceSolver {


    /**
     * Performs XOR operations on a sequence of integers within a specified range.
     *
     * This method calculates the XOR result of elements in the input array
     * between the specified left and right indices (inclusive).
     *
     * @param array $inputInitialValue The input array of integers.
     * @param int $left The starting index of the range (inclusive).
     * @param int $right The ending index of the range (inclusive).
     * 
     * @throws InvalidArgumentException If the left or right indices are invalid.
     *                                  Conditions for invalid indices:
     *                                  - $left is less than 0.
     *                                  - $right is greater than or equal to the array length.
     *                                  - $left is greater than $right.
     *
     * @return int The XOR result of the elements within the specified range.
     */
    public static function xorSeqOperations(array $inputInitialValue,int $left, int $right) {
        $result = 0;
        $length = count($inputInitialValue);

        if ($left < 0 || $right >= $length || $left > $right) {
            throw new InvalidArgumentException("Invalid left or right indices.");
        }

        for ($i = $left; $i <= $right; $i++) {
            $result ^= $inputInitialValue[$i];
        }

        echo "The XOR result from index {$left} to {$right} is: {$result}\n";
        return $result;

    }
}

XorSequenceSolver::xorSeqOperations([2, 4, 8, 7, 5, 0, 5, 8, 9], 1, 4);