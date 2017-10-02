<?php
/**
 * Created by PhpStorm.
 * User: gerardoMuelaPC
 * Date: 9/29/2017
 * Time: 7:03 PM
 */

include ("SmartStrategy.php");
include ("RandomStrategy.php");

class MoveStrategy{

    var $strategy;

    public function __construct($strategy)
    {
        $this->strategy = $strategy;
        switch ($strategy) {
            case "Smart":
                $this->strategy = new SmartStrategy();
                break;
            case "Random":
                $this->strategy = new RandomStrategy();
                break;
        }
    }

    public function makeMove($strategy)
    {
        switch ($strategy) {
            case "Smart":
                //Return Smart Move
                //return $this->strategy->makeSmartMove();
            case "Random":
                //Return Random Move
                return $this->strategy->makeRandomMove();
        }
    }
}


?>