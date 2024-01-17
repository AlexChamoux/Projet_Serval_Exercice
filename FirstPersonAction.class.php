<?php

class FirstPersonAction extends BaseClass{

    /*protected $map;

    public function getMap(){
        return $this->map;
    }*/

    public function checkAction(BaseClass $Base){
        //$this->map = $Base->getMap_id();    error_log("map check".print_r($Base, 1));

        $stmt = $this->_dbh->prepare("SELECT * FROM action WHERE map_id = $Base->map_id AND status = 0"); /*error_log($Base->map_id);*/
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($result)){
            return true;
        }else{
            return false;
        }
    }

    public function doAction(BaseClass $Base){ /*error_log(print_r($Base, 1 ));*/        

        if(empty($_SESSION['inventaire'])){
            //error_log("session debut action :".print_r($_SESSION, 1));
            $stmt = $this->_dbh->prepare("SELECT * FROM action WHERE map_id = $Base->map_id AND status = 0");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); /*error_log("result doAction :".print_r($result, 1));*/
            if(empty($result['requis'])){  /*error_log("result requis nul :".print_r($result['requis'], 1));*/
                $stmt = $this->_dbh->prepare("UPDATE action SET status = 1 WHERE map_id = $Base->map_id");
                $stmt->execute();
            }
            $stmt = $this->_dbh->prepare("SELECT * FROM items");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['inventaire'] = $result['description']; 
            //error_log("session fin action :".print_r($_SESSION, 1));
        }else{            
            //error_log("SESSION av porte :".print_r($_SESSION, 1));
            $stmt = $this->_dbh->prepare("SELECT * FROM action WHERE map_id = $Base->map_id AND status = 0");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); /*error_log("result requete action :".print_r($result, 1));*/
            if($result['requis'] == 1){
                //error_log("result requis :".$result['requis']);
                $stmt = $this->_dbh->prepare("UPDATE action SET status = 1 WHERE map_id = $Base->map_id");
                $stmt->execute();
            }
            $_SESSION['inventaire'] = ""; /*error_log("SESSION inventaire vidée :".print_r($_SESSION, 1));*/
        }
    }
}

?>