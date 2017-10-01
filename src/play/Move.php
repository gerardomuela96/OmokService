<?php
/**
 * Created by PhpStorm.
 * User: gerardoMuelaPC
 * Date: 9/29/2017
 * Time: 7:02 PM
 */

class Move{

    var $board;
    var $x;
    var $y;
    var $isWin;
    var $isDraw;

    public function __construct($board, $x, $y)
    {
        $this->board = $board;
        $this->x = $x;
        $this->y = $y;
    }

}

?>