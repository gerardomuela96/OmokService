<?php
/**
 * Created by PhpStorm.
 * User: gerardoMuelaPC
 * Date: 9/29/2017
 * Time: 7:00 PM
 */

if(!array_key_exists("pid", $_GET)){
    /* write code here */
    $data = array('response'=>false, 'reason'=>"Pid not specified");
    echo json_encode($data);
    exit;
}

else{
    if(file_exists("PATH TO GAMES'FOLDER".$_GET["pid"])){
        //Open file of state of the game
    }
    else{
        $data = array('response'=>false, 'reason'=>"Unknown Pid");
        echo json_encode($data);
        exti;

    }
}

?>