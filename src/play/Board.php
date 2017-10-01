<?php
/**
 * Created by PhpStorm.
 * User: gerardoMuelaPC
 * Date: 9/29/2017
 * Time: 7:02 PM
 */
class Board{

    var $array = array(array());

    public function __construct()
    {
        $this->array = array(array());
        for($i = 0; $i<15 ; $i++){
          for($j=0; $j < 15 ; $j++){
              $this->array[$i][$j] = 0;
          }
        }
    }
}
?>