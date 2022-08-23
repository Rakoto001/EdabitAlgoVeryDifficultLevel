<?php

class BowlingGame
{

    const POINTS = [1,2,3,4,5,6,7,8,9,10,11,12,13,14, self::MISS, self::SPARE, self::STRIKE];
    const STRIKE = 'X';
    const SPARE  = '/';
    const MISS   = '-';

    public static function lanceFrame()
    {
        $accumulationFrames = [];

        for($frame = 0; $frame < 5; $frame ++){
            $accumulationFrames[] = self::tryLancer();
        }

        var_dump($accumulationFrames);

        self::generateScore($accumulationFrames);
    }

    public static function testUnit()
    {
        $asingleFrame = [1,'/'] ;
        self::countPoints($asingleFrame, 1);
    }

    public static function generateScore(array $_accumulationFrames)
    {
        foreach ($_accumulationFrames as $frameNumerotation => $singleFrame) {

            self::countPoints($singleFrame, $frameNumerotation);
        }

    }

    public static function countPoints(array $_singleFrame, int $_frameNumerotation)
    {
        $pointForEachFrame = [];
        $status = '';
        $resultsPointsForFrame = [];

        foreach ($_singleFrame as $numeroEssai => $singleScore) {

            if ( $singleScore == self::SPARE && $numeroEssai != 0 ) {

                $status = 'spare';
                $pointForEachFrame[] = 15;
            } else if ($singleScore == self::MISS) {

                $pointForEachFrame[] = 0;
            }else {

                $pointForEachFrame[] = $singleScore;
            }
        }

        /** somme des points */
        $pointForEachFrame = array_sum($pointForEachFrame);
       

        if ($status != '') {
            $resultsPointsForFrame['status'] = $status;
        }
        $resultsPointsForFrame['pointForEachFrame'] = $pointForEachFrame; 

        // var_dump($status);
        var_dump(($resultsPointsForFrame));
        die;

        return $resultsPointsForFrame;

    }


    /**
     * lancement des bowling - 3 essais pour lancers
     *
     * @return void
     */
    public static function tryLancer()
    {

        $allPointsInOneLancer = [];
        for($essaiLancer = 0; $essaiLancer < 3; $essaiLancer ++){

            $tmp_points = self::generatePoint();

            if ($tmp_points == self::SPARE) {
                $allPointsInOneLancer[] = $tmp_points;
                break;
            } elseif ($tmp_points == self::STRIKE) {
                $allPointsInOneLancer[] = $tmp_points;
                break;
            } else {
                $allPointsInOneLancer[] = $tmp_points;
            }

        }

       return $allPointsInOneLancer;
    }
   
    /**
     * generation points 
     *
     * @return void
     */
    public static function generatePoint()
    {
        $index = array_rand(self::POINTS, 1);

        return self::POINTS[$index];

    }
}

BowlingGame::testUnit();