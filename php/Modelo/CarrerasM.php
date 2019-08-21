<?php 
/*Incluir las conexiones*/
require '../Config/Conexion.php';
class CarrerasM extends Conexion
{
    
  
    function Lista()
    {
        $sql="SELECT * FROM `carreras_tbl`";
        return  $this->SelectArray($sql);
    }

    public function AgregaDocente($POST){
        $rr=date("Y/m/d H:i:s");
        $USER='EFLORIAN';
        echo $Sql="INSERT INTO  carreras_tbl (`IDCARRERA`, `DESCR250`, `DATE_CREATE`, `USER_CREATE`) 
        VALUES ('".$POST['IdCarrera']."'
        ,'".utf8_decode($POST['NombreCarrera'])."',
        '".$rr."','".$USER."')";
        $this->Insert($Sql);
    }

    public function ActualizarDocente($POST){
        
        $SQL="UPDATE `carreras_tbl` 
                SET  DESCR250='".utf8_decode($POST['NombreCarrera'])."',
                DATE_UPDATE='".$this->DataTime."',
                USER_UPDATE='".$this->User."'
                WHERE IDCARRERA='".$POST['IdCarrera']."'
        ";
        
        $this->Query($SQL);
    }

    public function EliminarDocente($POST){
        $SQL="DELETE FROM carreras_tbl WHERE IDCARRERA='".$POST['IdCarrera']."'";
        $this->Query($SQL);
    }
}

?>