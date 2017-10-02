<?php
/**
 * Created by PhpStorm.
 * User: gerardoMuelaPC
 * Date: 9/29/2017
 * Time: 7:02 PM
 */

class Move{

    var $x;
    var $y;
    var $isWin = false;
    var $isDraw = false;
    var $row = array();

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function isDraw($board)
    {
        for($i = 0; $i < 15; $i++){
            for($j = 0; $j < 15; $j++){
                if($board[$i][$j] == 0){
                    return false;
                }
            }
        }
        return true;
    }

    public function isWin($board)
    {
        //Get coordinates
        $x = $this->x;
        $y = $this->y;

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

        //Check if there are 5 consecutive rocks
        if($horizontalCounter >= 5 || $verticalCounter >= 5 || $leftDiagonalCounter >= 5 || $rightDiagonalCounter >= 5){
            return true;
        }

        return false;
    }

}

?>