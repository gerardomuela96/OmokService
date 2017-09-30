<?php
/**
 * Created by PhpStorm.
 * User: gerardoMuelaPC
 * Date: 9/29/2017
 * Time: 7:02 PM
 */
class Board{

    var $board = array(array());

    public function __construct()
    {
        $this->board = array(array());
        for($i = 0; $i<15 ; $i++){
          for($j=0; $j < 15 ; $j++){
              $this->board[$i][$j] = 0;
          }
        }
    }
}

$game = new Board();

for($i = 0; $i<15 ; $i++) {
    for ($j = 0; $j < 15; $j++) {
            echo $game->board[$i][$j]." ";
    }
    echo "\r\n";
}
?>