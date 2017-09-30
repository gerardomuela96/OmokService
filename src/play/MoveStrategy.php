<?php
/**
 * Created by PhpStorm.
 * User: gerardoMuelaPC
 * Date: 9/29/2017
 * Time: 7:03 PM
 */

class MoveStrategy{
    public function __construct($strategy)
    {
        switch ($strategy) {
            case "Smart":
                $this->strategy = new SmartStrategy();
                break;
            case "Random":
                $this->strategy = new RandomStrategy();
                break;
        }
    }
}


?>