<?php
class Conexion
{
    public $Conexion;
    public $DataTime;
    public $User;
     function __construct() {
       $this->Conexion();
        $a=  $this->Conexion;
        
        $this->DataTime=date("Y/m/d H:i:s");
        $this->User='EFLORIAN';
    
    }
    private function Conexion(){
        $con = mysqli_connect("localhost","root","1234","simonbolivar");
        $this->Conexion=$con;
    }

    public function Insert($SQL){
            mysqli_query($this->Conexion,$SQL);

    }

    public Function Delete(){

    }

    public function SelectArray($Sql){
        mysqli_set_charset($this->Conexion,"utf8");
            $Query=mysqli_query($this->Conexion,$Sql);
            $myArray = array();
        
            if ($Query) {
            while($row = $Query->fetch_array(MYSQLI_ASSOC)) {
                $myArray[] = $row;
            }
            //return json_encode($myArray, JSON_UNESCAPED_UNICODE);
                /*while($row=mysqli_fetch_array($Query)) {
                                        $myArray[] = $row;
                                }
                                //var_dump($myArray);                               
                                echo json_encode($myArray, JSON_UNESCAPED_UNICODE);
                                */
            }
            return  json_encode($myArray, JSON_UNESCAPED_UNICODE);
            //$Array=mysqli_fetch_array($Query);
           // var_dump($Query);
            //echo json_encode($Query);
    }

    public function Query($SQL){
        mysqli_query($this->Conexion,$SQL);

        }
    

}




?>