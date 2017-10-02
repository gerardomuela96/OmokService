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

}

?>