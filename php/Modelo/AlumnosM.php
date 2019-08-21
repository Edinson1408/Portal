<?php 
/*Incluir las conexiones*/
require '../Config/Conexion.php';
class AlumnosM extends Conexion
{
    
    function Lista()
    {
        $sql="
        SELECT per.NOMBRES as NOM, per.APELLIDOS as APE, car.DESCR250 as CARRERA, alu.CICLO_RELATIVO as CICLO 
        FROM datos_personales_tbl as per, carreras_tbl as car, alumno_tbl as alu
        WHERE alu.IDPERSONA=per.IDPERSONA AND alu.IDCARRERA=car.IDCARRERA";
        return  $this->SelectArray($sql);
    }

    public function AgregaDocente($POST){
        $rr=date("Y/m/d H:i:s");
        $USER='EFLORIAN';
        echo $Sql="INSERT INTO  carreras_tbl ('IDCARRERA',
        'DESCR250',
        'DATE_CREATE',
        'USER_CREATE') 
        VALUES ('".$POST['IdCarrera']."'
        ,'".$POST['NombreCarrera']."',
        '".$rr."','".$USER."')";
        $this->Insert($Sql);
    }
}

?>