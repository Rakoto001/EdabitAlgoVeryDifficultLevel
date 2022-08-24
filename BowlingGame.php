<?php

class BowlingGame
{

    const AUTRE_POINTS = [self::MISS, self::SPARE, self::STRIKE];
    const STRIKE = 'X';
    const SPARE  = '/';
    const MISS   = '-';
    const MAX_POINT = 15;

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
            $num = self::generateRandomPoint();
            var_dump($num);
            die;
        // $asingleFrame = [1,'/'] ;
        // self::countPoints($asingleFrame, 1);
    }

      /**
     * generation points 
     *
     * @return void
     */
    public static function generatePoint()
    {
        $index = array_rand(self::AUTRE_POINTS, 1);

        return self::AUTRE_POINTS[$index];

    }

    public static function generateRandomPoint($maxQuillesRestant = 15, $compteEssai = 0, $accumulationPointParFrame = [])
    {
       $compteEssai ++;
       $lanceAleatoire = 1;

     

        /** si lanceAleatoire 0 jouer entre le STRIKE ou SPARE ou NULL */
        if ($lanceAleatoire == 1) {
                /** si commencement jeu;  */
                if ($maxQuillesRestant > 0 && $compteEssai <=3) {

                    $quilleObtenu = mt_rand(0,$maxQuillesRestant);
    
                    /** si quille 0 ou STRIKE ou spare */
                    if ($quilleObtenu == 15 && $compteEssai == 1) {
    
                        $accumulationPointParFrame[] = self::STRIKE; //'X';
        
                        return $accumulationPointParFrame;
                    } else if (($quilleObtenu == $maxQuillesRestant && $compteEssai == 2) || ($quilleObtenu == $maxQuillesRestant && $compteEssai == 3)) {
        
                        $accumulationPointParFrame[] = self::SPARE;
        
                        return $accumulationPointParFrame;
                    } else if ($quilleObtenu == 0) {
                        $accumulationPointParFrame[] = self::MISS;
    
                       // relancer la partie
                        return self::generateRandomPoint($maxQuillesRestant, $compteEssai, $accumulationPointParFrame);
                    } else {
    
                        $quillesRestant = $maxQuillesRestant - $quilleObtenu;
            
                        if ($compteEssai <= 3 ){
                           
                            $accumulationPointParFrame[] = $quilleObtenu;

                            return self::generateRandomPoint($quillesRestant, $compteEssai, $accumulationPointParFrame);
                        }
                        
                        return $accumulationPointParFrame;
    
                    }
    
    
            
                   
                  
                }


        }

        return $accumulationPointParFrame;


        //     $quilleObtenu = self::generatePoint();
           
        //     if ($quilleObtenu == self::STRIKE && $compteEssai == 1) {

        //         $accumulationPointParFrame[] = self::STRIKE; //'X';

        //         return $accumulationPointParFrame;
        //     } else if (($quilleObtenu == self::SPARE && $compteEssai == 2) || ($quilleObtenu == self::SPARE && $compteEssai == 3)) {

        //         $accumulationPointParFrame[] = self::SPARE;

        //         return $accumulationPointParFrame;
        //     } else if ($quilleObtenu == self::MISS) {
        //         $accumulationPointParFrame[] = self::MISS;
               
        //         $quillesRestant = self::generateRandomPoint($maxQuillesRestant, $compteEssai - 1, $accumulationPointParFrame);
        //     } else {
        //         /** relancer la partie sans prendre la score*/

        //         $quillesRestant = self::generateRandomPoint($maxQuillesRestant, $compteEssai - 1, $accumulationPointParFrame);
        //     }

            
        // } else {





          
           

      

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

  
   
  
}

BowlingGame::testUnit();