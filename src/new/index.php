<?php
/**
 * Created by PhpStorm.
 * User: gerardoMuelaPC
 * Date: 9/27/2017
 * Time: 12:20 AM
 */

include ("../play/Game.php");

$strategies = array("Smart", "Random"); // supported strategies

if(!array_key_exists("strategy", $_GET)){
    /* write code here */
    $data = array('response'=>false, 'reason'=>"Strategy not specified");
}

else{
    if($_GET["strategy"] == "Smart" || $_GET["strategy"] == "Random"){
        $strategy = $_GET["strategy"];
        // write your code here … use uniqid() to create a unique play id.
        $data = array('response'=>true, 'pid'=>uniqid());

        $gameObject = new Game($data["pid"], $strategy);

        //Create new game file to save the state of the game
        $gameFile = fopen("Games/".$gameObject->id.".txt", "w");
        fwrite($gameFile, $strategy."\r\n");
        fwrite($gameFile, json_encode($gameObject->Board));
        fclose($gameFile);

    }
    else{
        $data = array('response'=>false, 'reason'=>"Unknown strategy");
    }
}

echo json_encode($data);

?>