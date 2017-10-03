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

                array_push($this->row,$x-1);
                array_push($this->row, $y);

                for($i = $x-2; $i >= 0; $i--){
                    if($board[$i][$y] != $board[$x][$y]){
                        break;
                    }
                    $horizontalCounter++;
                    if($horizontalCounter <= 5){
                        array_push($this->row, $i);
                        array_push($this->row, $y);
                    }
                }
            }
        }

        //Horizontal Checking Right
        if($x != 14){
            if($board[$x+1][$y] == $board[$x][$y] && $horizontalCounter < 5){

                //Add similar consecutive rocks
                $horizontalCounter+=1;

                array_push($this->row,$x+1);
                array_push($this->row, $y);

                for($i = $x+2; $i < 15; $i++){
                    if($board[$i][$y] != $board[$x][$y]){
                        break;
                    }
                    $horizontalCounter++;
                    if($horizontalCounter <= 5){
                        array_push($this->row, $i);
                        array_push($this->row, $y);
                    }
                }
            }
        }

        //Reset Row if counter is not 5
        if($horizontalCounter != 5){
            $this->row = array();
        }

        //Vertical Checking Up
        if($y != 0){

            if($board[$x][$y-1] == $board[$x][$y]){

                //Add similar consecutive rocks
                $verticalCounter+=1;

                array_push($this->row, $x);
                array_push($this->row, $y-1);

                for($i = $y-2; $i >= 0; $i--){
                    if($board[$x][$i] != $board[$x][$y]){
                        break;
                    }
                    $verticalCounter++;
                    if($verticalCounter <= 5){
                        array_push($this->row, $x);
                        array_push($this->row, $i);
                    }
                }
            }
        }

        //Vertical Checking Down
        if($y != 14){
            if($board[$x][$y+1] == $board[$x][$y] && $verticalCounter < 5){

                //Add similar consecutive rocks
                $verticalCounter+=1;

                array_push($this->row, $x);
                array_push($this->row, $y+1);

                for($i = $y+2; $i < 15; $i++){
                    if($board[$x][$i] != $board[$x][$y]){
                        break;
                    }
                    $verticalCounter++;
                    if($verticalCounter <= 5){
                        array_push($this->row, $x);
                        array_push($this->row, $i);
                    }
                }
            }
        }

        //Reset Row if counter is not 5
        if($verticalCounter != 5 && $horizontalCounter != 5){
            $this->row = array();
        }

        //Left Diagonal Checking Up
        if($x != 0 && $y != 0){

            if($board[$x-1][$y-1] == $board[$x][$y]){

                //Add similar consecutive rocks
                $leftDiagonalCounter+=1;

                array_push($this->row, $x-1);
                array_push($this->row, $y-1);

                for($i = $x-2, $j = $y-2; $i >= 0 && $j >= 0; $i--, $j--){
                    if($board[$i][$j] != $board[$x][$y]){
                        break;
                    }
                    $leftDiagonalCounter++;
                    if($leftDiagonalCounter <= 5){
                        array_push($this->row, $i);
                        array_push($this->row, $j);
                    }
                }
            }
        }

        //Left Diagonal Checking Down
        if($x != 14 && $y != 14){
            if($board[$x+1][$y+1] == $board[$x][$y] && $leftDiagonalCounter < 5){

                //Add similar consecutive rocks
                $leftDiagonalCounter+=1;

                array_push($this->row, $x+1);
                array_push($this->row, $y+1);

                for($i = $x+2, $j = $y+2; $i < 15 && $j < 15; $i++, $j++){
                    if($board[$i][$j] != $board[$x][$y]){
                        break;
                    }
                    $leftDiagonalCounter++;
                    if($leftDiagonalCounter <= 5){
                        array_push($this->row, $i);
                        array_push($this->row, $j);
                    }
                }
            }
        }

        //Reset Row if counter is not 5
        if($leftDiagonalCounter != 5 && $verticalCounter != 5 && $horizontalCounter != 5){
            $this->row = array();
        }

        //Right Diagonal Checking Up
        if($x != 0 && $y != 14){

            if($board[$x-1][$y+1] == $board[$x][$y]){

                //Add similar consecutive rocks
                $rightDiagonalCounter+=1;

                array_push($this->row, $x-1);
                array_push($this->row, $y+1);


                for($i = $x-2, $j=$y+2; $i >= 0 && $j < 15; $i--, $j++){
                    if($board[$i][$j] != $board[$x][$y]){
                        break;
                    }
                    $rightDiagonalCounter++;
                    if($rightDiagonalCounter <= 5){
                        array_push($this->row, $i);
                        array_push($this->row, $j);
                    }

                }
            }
        }

        //Right Diagonal Checking Down
        if($x != 14 && $y != 0){
            if($board[$x+1][$y-1] == $board[$x][$y] && $rightDiagonalCounter < 5){

                //Add similar consecutive rocks
                $rightDiagonalCounter+=1;

                array_push($this->row, $x+1);
                array_push($this->row, $y-1);

                for($i = $x+2, $j = $y-2; $i < 15 && $j >= 0; $i++, $j--){
                    if($board[$i][$j] != $board[$x][$y]){
                        break;
                    }
                    $rightDiagonalCounter++;
                    if($rightDiagonalCounter <= 5){
                        array_push($this->row, $i);
                        array_push($this->row, $j);
                    }

                }
            }
        }

        //Create Right Diagonal Row
        array_push($this->row, $x);
        array_push($this->row, $y);

        //Reset Row if counter is not 5
        if($leftDiagonalCounter != 5 && $verticalCounter != 5 && $horizontalCounter != 5 && $rightDiagonalCounter != 5){
            $this->row = array();
        }

        //Order the winning row array
        if(!empty($this->row)){
            for($i = 0; $i < sizeof($this->row); $i++){
                if($i%2 == 0){
                    $x_array[]= $this->row[$i];
                }
                else{
                    $y_array[]= $this->row[$i];
                }
            }
            //Reset array
            $this->row = array();


            if($rightDiagonalCounter == 5){
                //Sort x coordinates
                sort($x_array);
                //Sort y coordinates
                rsort($y_array);
            }

            else{
                //Sort x coordinates
                sort($x_array);
                //Sort y coordinates
                sort($y_array);
            }

            for($j = 0; $j < sizeof($x_array) && sizeof($y_array); $j++){
                    $this->row[] = $x_array[$j];

                    $this->row[] = $y_array[$j];
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