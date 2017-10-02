<?php
/**
 * Created by PhpStorm.
 * User: gerardoMuelaPC
 * Date: 9/29/2017
 * Time: 7:03 PM
 */

class RandomStrategy{

    public function makeRandomMove(){
        //Random number generators

        $coords = array();

        $coords[0] = rand(0,14); //Gennerate x

        $coords[1] = rand(0,14); //Gennerate y

        return $coords;
    }
}

?>