<?php
//Authors Carlos Herrera and Gerardo Muela
class GameInfo{

    var $size;
    var $strategies;

    public function __construct(array $data)
    {
        $this->size = $data['size'];
        $this->strategies = $data['strategies'];
    }

}

//create  GameInfo , test  JSON output
$gameInfo = new GameInfo(array('size'=>15, 'strategies'=>["Smart","Random"]));

echo json_encode($gameInfo);
# <!--https://www.codebyamir.com/blog/object-to-json-in-php-->
?>