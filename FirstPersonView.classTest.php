<?php

class FirstPersonView extends BaseClass{
    const images = "./images/";

    protected $_mapId;

    public function __construct($mapId){
        $this->_mapId = $mapId;
    }

    public function getView(){
        return self::IMAGES_DIRECTORY . "map" . $this->_mapId . ".jpg";
    }

    public function getAnimCompass(){
        $_currentAngle = $this->_mapId % 4;
        switch ($_currentAngle){
            case 0:
                return "east";
            case 90:
                return "north";
            case 180:
                return "west";
            case 270:
                return "south";
            
        }
    }
}


?>