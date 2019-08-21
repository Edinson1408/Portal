<?php 
/*Incluir las conexiones*/
require '../Config/Conexion.php';
class CursoM extends Conexion
{
    function Lista()
    {
        $sql="SELECT a.IDCURSOS, a.DESCR250 as CURSOS, b.DESCR250 as CARRERAS,
        A.NUM_CREDITOS,
        A.NUM_HORAS,
        A.CICLO_RELATIVO
        FROM cursos_tbl as a, carreras_tbl as b WHERE a.IDCARRERA=b.IDCARRERA";
        return  $this->SelectArray($sql);
    }
    public function AgregaCurso($POST){
        $rr=date("Y/m/d H:i:s");
        $USER='EFLORIAN';

        /*
        [IdCursos] => 15242
        [IdCarrera] => 103
        [Descr250] => pruen
        [NumCreditos] => asd
        [NumHoras] => 01
        [CicloRelativo] => 010
        [TipoCurso] => 
        [Peticion] => Agregar
        */


        echo $Sql="INSERT INTO `cursos_tbl`(`IDCURSOS`, `IDCARRERA`, `DESCR250`, `NUM_CREDITOS`
        , `NUM_HORAS`, `CICLO_RELATIVO`, `DATE_CREATE`, `USER_CREATE`) 
        VALUES ('".$POST['IdCursos']."' , '".$POST['IdCarrera']."' , '".$POST['Descr250']."' , '".$POST['NumCreditos']."',
        '".$POST['NumHoras']."','".$POST['CicloRelativo']."','".$rr."','".$USER."')";
        //$this->Insert($Sql);
    }

    public function EliminarCurso($POST){
        echo $sql ="DELETE FROM `cursos_tbl` WHERE `IDCURSOS` ='".$POST['IdCurso']."'";
    }
}

?>
