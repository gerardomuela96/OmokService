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
            }
        }

        //Horizontal Checking Left
        if($x != 0 && $horizontalCounter > $verticalCounter
            && $horizontalCounter > $rightDiagonalCounter
            && $horizontalCounter > $leftDiagonalCounter){
            if($board[$x-1][$y] == 0){
                return array($x-1,$y);
            }
        }

        //Horizontal Checking Right
        if($x != 14 && $horizontalCounter > $verticalCounter
            && $horizontalCounter > $rightDiagonalCounter
            && $horizontalCounter > $leftDiagonalCounter){
            if($board[$x+1][$y] == 0){
                return array($x+1,$y);
            }
        }

        //Vertical Checking Up
        if($y != 0 && $verticalCounter > $horizontalCounter
            && $verticalCounter > $rightDiagonalCounter
            && $verticalCounter > $leftDiagonalCounter){
            if($board[$x][$y-1] == 0){
                return array($x,$y-1);
            }
        }

        //Vertical Checking Down
        if($y != 14 && $verticalCounter > $horizontalCounter
            && $verticalCounter > $rightDiagonalCounter
            && $verticalCounter > $leftDiagonalCounter){
            if($board[$x][$y+1] == 0){
                return array($x,$y+1);
            }
        }

        //Left Diagonal Checking Up
        if($x != 0 && $y != 0 && $leftDiagonalCounter > $horizontalCounter
            && $leftDiagonalCounter > $verticalCounter
            && $leftDiagonalCounter > $rightDiagonalCounter){
            if($board[$x-1][$y-1] == 0){
                return array($x-1,$y-1);
            }
        }

        //Left Diagonal Checking Down
        if($x != 14 && $y != 14 && $leftDiagonalCounter > $horizontalCounter
            && $leftDiagonalCounter > $verticalCounter
            && $leftDiagonalCounter > $rightDiagonalCounter){
            if($board[$x+1][$y+1] == 0){
                return array($x+1,$y+1);
            }
        }

        //Right Diagonal Checking Up
        if($x != 0 && $y != 14 && $rightDiagonalCounter > $horizontalCounter
            && $rightDiagonalCounter > $verticalCounter
            && $rightDiagonalCounter > $leftDiagonalCounter){
            if($board[$x-1][$y+1] == 0){
                return array($x-1,$y+1);
            }
        }

        //Right Diagonal Checking Down
        if($x != 0 && $y != 14 && $rightDiagonalCounter > $horizontalCounter
            && $rightDiagonalCounter > $verticalCounter
            && $rightDiagonalCounter > $leftDiagonalCounter){
            if($board[$x+1][$y-1] == 0){
                return array($x+1,$y-1);
            }
        }

        return array($x+5,$y+5);

    }
}
?>