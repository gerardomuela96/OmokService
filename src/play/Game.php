<?php
/**
 * Created by PhpStorm.
 * User: gerardoMuelaPC
 * Date: 9/29/2017
 * Time: 7:02 PM
 */

include ("Board.php");
include ("MoveStrategy.php");
include ("Move.php");

class Game{

    var $gameBoard;
    var $moveStrategy;
    var $strategy;

    public function __construct($strategy)
    {
        $this->gameBoard = new Board();
        $this->moveStrategy = new MoveStrategy($strategy);
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
        if($this->gameBoard->array[$x][$y] == 0){
            $this->gameBoard->array[$x][$y] = 1;
        }

        return new Move($x, $y);

    }

    public function makeOpponentMove($playerMove)
    {
        $coords = $this->moveStrategy->makeMove($this->strategy, $playerMove, $this->gameBoard->array);

        while(($this->gameBoard->array[$coords[0]][$coords[1]] != 0 && !$playerMove->isDraw)
            || ($coords[0] < 0 || $coords[0] > 14 || $coords[1] < 0 || $coords[1] > 14)){
            $coords = array(rand(0,14),rand(0,14));
        }

        if($this->gameBoard->array[$coords[0]][$coords[1]] == 0){
            $this->gameBoard->array[$coords[0]][$coords[1]] = 2;
        }

        return new Move($coords[0], $coords[1]);
    }

    public function updateBoard($board){
        $this->gameBoard = $board;
    }
}

?>