<?php
/**
 * Created by PhpStorm.
 * User: gerardoMuelaPC
 * Date: 9/29/2017
 * Time: 7:02 PM
 */

include ("Board.php");
include ("MoveStrategy.php");

class Game{

    var $id;
    var $Board;
    var $MoveStrategy;

    public function __construct($id, $strategy)
    {
        $this->id = $id;
        $this->Board = new Board();
        $this->MoveStrategy = new MoveStrategy($strategy);
    }
}

?>