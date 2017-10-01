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

    var $gameBoard;
    var $moveStrategy;
    var $strategy;

    public function __construct($strategy)
    {
        $this->gameBoard = new Board();
        $this->MoveStrategy = new MoveStrategy($strategy);
        $this->strategy = $strategy;
    }

    public static function fromJsonString($json)
    {
        //Decode the JSON object to create a Game object
        $content = explode("\r\n", $json);

        $strategy =  $content[0]; //Set strategy
        $game = new Game($strategy);

        $game->updateBoard(json_decode($content[1])); //Update board

        return $game;

    }

    public function makePlayerMove($x, $y)
    {
        //Update the board with coordinates provided

        $this->gameBoard->array[$x][$y] = 1;

        return new Move($this->gameBoard, $x, $y);

    }

    public function updateBoard($board){
        $this->gameBoard = $board;
    }
}

?>