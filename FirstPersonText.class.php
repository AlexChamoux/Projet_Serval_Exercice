<?php

class FirstPersonText extends BaseClass{
    
    protected $map;

    public function __construct() {
        parent::__construct();
    }

    public function getMap(){
        return $this->map;
    }

    public function getText(BaseClass $Base){    
        
            //$this->map = $Base->getMap_id();
            //error_log("Map :".$this->map);

            $stmt = $this->_dbh->prepare("SELECT * FROM action WHERE map_id = $Base->map_id");
            $stmt->execute();
            $response = $stmt->fetch(PDO::FETCH_ASSOC); /*error_log("response texte :".print_r($response, 1));*/

            if(!empty($response['status'])){
                $status_action = $response['status'];
            }else{
                $status_action = 0;
            }

            $stmt = $this->_dbh->prepare("SELECT * FROM text WHERE map_id = $Base->map_id AND status_action = $status_action ");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); /*error_log("result :".print_r($result, 1));*/

            if(!empty($result['text'])){ /*error_log("texte :".$result['text']);*/
                $text = $result['text'];
                return $text;
            }else{
            return "";
            }
    }
}

?>