<?php 
/*Incluir las conexiones*/
require '../Config/Conexion.php';
class InformacionALumnosM extends Conexion
{
    
  
    public function MisNotas($POST)
    {
        $sql="SELECT A.IDMALLA,A.IDCARRERA,A.DESCR250,A.PERIODO,B.IDCURSO,B.DESCURSO,B.CICLO FROM malla_tbl A 
        LEFT JOIN detalle_malla_tbl B ON A.IDMALLA=B.IDMALLA AND A.IDCARRERA=B.IDCARRERA 
        WHERE A.IDCARRERA='101' AND A.PERIODO='2020'
        and b.CICLO='1'";
        return  $this->SelectArray($sql);
    }

    
}

?>