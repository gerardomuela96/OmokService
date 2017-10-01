<?php
/**
 * Created by PhpStorm.
 * User: gerardoMuelaPC
 * Date: 9/29/2017
 * Time: 7:00 PM
 */

include ("Game.php");
include ("Move.php");

if(!array_key_exists("pid", $_GET)){
    /* write code here */
    $data = array('response'=>false, 'reason'=>"Pid not specified");
    echo json_encode($data);
    exit;
}

else{
    if(file_exists("../new/Games/".$_GET["pid"].".txt")){
        //Open file to read state of the game

        //Get Game object
        $file= "../new/Games/".$_GET["pid"].".txt";
        $json = file_get_contents($file);
        $game = Game::fromJsonString($json);

        if(!array_key_exists("move", $_GET)){
            $data = array('response'=>false, 'reason'=>"Move not specified");
            echo json_encode($data);
            exit;
        }
        else{
            //Get coords
            $coords = explode(",", $_GET["move"]);

            if($coords[0] == null || $coords[1] == null){
                $data = array('response'=>false, 'reason'=>"Move not well-formed");
                echo json_encode($data);
                exit;
            }

            if(intval($coords[0]) > 14 || intval($coords[0]) < 0){
                $data = array('response'=>false, 'reason'=>"Invalid x coordinate, ".intval($coords[0]));
                echo json_encode($data);
                exit;
            }

            if(intval($coords[1]) > 14 || intval($coords[1]) < 0){
                $data = array('response'=>false, 'reason'=>"Invalid y coordinate, ".intval($coords[1]));
                echo json_encode($data);
                exit;
            }

            else{
                $x = intval($coords[0]);
                $y = intval($coords[1]);
                $playerMove = $game->makePlayerMove($x,$y);

                //Update Game file
                $gameFile = fopen("../new/Games/".$_GET["pid"].".txt", "w");
                fwrite($gameFile, $game->strategy."\r\n");
                fwrite($gameFile, json_encode($game->gameBoard));
                fclose($gameFile);
            }
        }
    }
    else{
        $data = array('response'=>false, 'reason'=>"Unknown Pid");
        echo json_encode($data);
        exit;

    }
}

?>