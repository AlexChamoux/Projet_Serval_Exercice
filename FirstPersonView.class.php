<?php

class FirstPersonView extends BaseClass{
    
    protected $compass;

    public function __construct() {
        parent::__construct();
    }

    public function getAnimCompass(){ /*error_log($this->compass);*/
        return $this->compass;
    }

    public function setAnimCompass(string $compass){ /*error_log("coucouSet");*/
        $this->compass = $compass;
    }

    public function init(){
        $this->compass = "./assets/east.png";
        $this->_currentAngle = 0;  /*error_log("currentAngleInit".$this->_currentAngle);*/     
    }

    public function AnimCompass(BaseClass $Base){
        $newcompass = $this->compass;
        //error_log("currentAngleAnimCompassEntré :".$Base->_currentAngle); 
        switch($Base->_currentAngle){
            case 0 :
                $newcompass = "./assets/east.png";
                break;
            
            case 90 : 
                $newcompass = "./assets/north.png";
                break;
            
            case 180 : 
                $newcompass = "./assets/west.png";
                break;
            
            case 270 : 
                $newcompass = "./assets/south.png";
                break;
            }
            $this->compass = $newcompass;
            //error_log("Newcompass".$newcompass);
                    
    }
}
?>