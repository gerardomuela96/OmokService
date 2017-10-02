<?php
/**
 * Created by PhpStorm.
 * User: gerardoMuelaPC
 * Date: 9/29/2017
 * Time: 7:04 PM
 */

class SmartStrategy{


    public function makeSmartMove($playerMove, $board)
    {
        //Get coords from the player
        $x = $playerMove->x;
        $y = $playerMove->y;

        //Counters
        $verticalCounter = 1;
        $horizontalCounter = 1;
        $rightDiagonalCounter = 1;
        $leftDiagonalCounter = 1;

        //Horizontal Checking Left
        if($x != 0){
            if($board[$x-1][$y] == $board[$x][$y]){

                //Add similar consecutive rocks
                $horizontalCounter+=1;

                for($i = $x-2; $i >= 0; $i--){
                    if($board[$i][$y] != $board[$x][$y]){
                        break;
                    }
                    $horizontalCounter++;
                }
                if($horizontalCounter == 3 || $horizontalCounter == 4){
                    return array($x+1,$y);
                }
            }
        }

        //Horizontal Checking Right
        if($x != 14){
            if($board[$x+1][$y] == $board[$x][$y]){

                //Add similar consecutive rocks
                $horizontalCounter+=1;

                for($i = $x+2; $i < 15; $i++){
                    if($board[$i][$y] != $board[$x][$y]){
                        break;
                    }
                    $horizontalCounter++;
                }
                if($horizontalCounter == 3 || $horizontalCounter == 4){
                    return array($x-1,$y);
                }
            }
        }

        //Vertical Checking Up
        if($y != 0){
            if($board[$x][$y-1] == $board[$x][$y]){

                //Add similar consecutive rocks
                $verticalCounter+=1;

                for($i = $y-2; $i >= 0; $i--){
                    if($board[$x][$i] != $board[$x][$y]){
                        break;
                    }
                    $verticalCounter++;
                }
                if($verticalCounter == 3 || $verticalCounter == 4){
                    return array($x,$y+1);
                }
            }
        }

        //Vertical Checking Down
        if($y != 14){
            if($board[$x][$y+1] == $board[$x][$y]){

                //Add similar consecutive rocks
                $verticalCounter+=1;

                for($i = $y+2; $i < 15; $i++){
                    if($board[$x][$i] != $board[$x][$y]){
                        break;
                    }
                    $verticalCounter++;
                }
                if($verticalCounter == 3 || $verticalCounter == 4){
                    return array($x,$y-1);
                }
            }
        }

        //Left Diagonal Checking Up
        if($x != 0 && $y != 0){
            if($board[$x-1][$y-1] == $board[$x][$y]){

                //Add similar consecutive rocks
                $leftDiagonalCounter+=1;

                for($i = $x-2, $j = $y-2; $i >= 0 && $j >= 0; $i--, $j--){
                    if($board[$i][$j] != $board[$x][$y]){
                        break;
                    }
                    $leftDiagonalCounter++;
                }
                if($leftDiagonalCounter == 3 || $leftDiagonalCounter == 4){
                    return array($x+1,$y+1);
                }
            }
        }

        //Left Diagonal Checking Down
        if($x != 14 && $y != 14){
            if($board[$x+1][$y+1] == $board[$x][$y]){

                //Add similar consecutive rocks
                $leftDiagonalCounter+=1;

                for($i = $x+2, $j = $y+2; $i < 15 && $j < 15; $i++, $j++){
                    if($board[$i][$j] != $board[$x][$y]){
                        break;
                    }
                    $leftDiagonalCounter++;
                }
                if($leftDiagonalCounter == 3 || $leftDiagonalCounter == 4){
                    return array($x-1,$y-1);
                }
            }
        }

        //Right Diagonal Checking Up
        if($x != 0 && $y != 14){
            if($board[$x-1][$y+1] == $board[$x][$y]){

                //Add similar consecutive rocks
                $rightDiagonalCounter+=1;

                for($i = $x-2, $j=$y+2; $i >= 0 && $j < 15; $i--, $j++){
                    if($board[$i][$j] != $board[$x][$y]){
                        break;
                    }
                    $rightDiagonalCounter++;
                }
                if($rightDiagonalCounter == 3 || $rightDiagonalCounter == 4){
                    return array($x+1,$y-1);
                }
            }
        }

        //Right Diagonal Checking Down
        if($x != 14 && $y != 0){
            if($board[$x+1][$y-1] == $board[$x][$y]){

                //Add similar consecutive rocks
                $rightDiagonalCounter+=1;

                for($i = $x+2, $j = $y-2; $i < 15 && $j >= 0; $i++, $j--){
                    if($board[$i][$j] != $board[$x][$y]){
                        break;
                    }
                    $rightDiagonalCounter++;
                }
                if($rightDiagonalCounter == 3 || $rightDiagonalCounter == 4){
                    return array($x-1,$y+1);
                }
            }
        }


        return array(rand(0,14),rand(0,14));

    }

}

?>