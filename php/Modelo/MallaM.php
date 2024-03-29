<?php 
/*Incluir las conexiones*/
require '../Config/Conexion.php';

class MallaM  extends Conexion
{
    
    function Lista()
    {
        $sql="
        SELECT doc.IDDOCENTE, per.NOMBRES as NOM, per.APELLIDOS as APE, doc.CARRERA_PROFESIONAL as CARRERA
		FROM datos_personales_tbl as per, docentes_tbl as doc
		WHERE doc.IDPERSONA=per.IDPERSONA";
        return  $this->SelectArray($sql);
    }

    public function ValidaMalla($POST){
        if ($POST['IdMalla']) {
            $IdMalla=" IDMALLA = '".$POST['IdMalla']."' ";
        }
        if ($POST['IdCarrera']) {
            $IdCarrera=" AND  IDCARRERA ='".$POST['IdCarrera']."' ";
        }
        if ($POST['Periodo']) {
            $Periodo=" AND PERIODO='".$POST['Periodo']."' ";
        }

            $SqlCabecera="SELECT * FROM `malla_tbl` where $IdMalla  $IdCarrera $Periodo";
            $Cabecera=json_decode($this->SelectArray($SqlCabecera));
            $Cabecera=get_object_vars($Cabecera[0]);
            $SqlDetalle="SELECT * FROM `detalle_malla_tbl` where $IdMalla  $IdCarrera ";
            $Detalle=json_decode($this->SelectArray($SqlDetalle));
            //$Detalle=get_object_vars($Detalle);
            $Cabecera['DETALLE']=$Detalle;
            $Cabecera['EXTRAS']=$this->CursosExtras();
            
        return $Cabecera;
        
    }

    public function CursosExtras(){
        $SqlDetalle="SELECT ' ' ID_DETALLE_MALLA, ' ' IDMALLA , IDCARRERA , IDCURSOS AS IDCURSO, DESCR250 AS DESCURSO , CICLO_RELATIVO AS CICLO FROM `cursos_tbl` WHERE IDCARRERA='10010' ";
        $Detalle=json_decode($this->SelectArray($SqlDetalle));
        return $Detalle;
    }

    public function AgregaAlumno($POST){
       $IdPersona=$this->AgregaPersona($POST);
       
        $rr=date("Y/m/d H:i:s");
        $USER='EFLORIAN';
        /*
        SELECT LPAD('34',5,'0') FROM DUAL;
        */
        echo $Sql="INSERT INTO   `alumno_tbl`(
          `IDALUMNO`,
         `IDPERSONA`,
         `ANO_INGRESO`,
         `ANO_EGRESO`,
         `PERIODO_INGRESO`,
         `PERIODO_EGRESO`,
         `CICLO_RELATIVO`,
         `IDCARRERA`,
         `DATE_CREATE`,
         `USER_CREATE`
         )
        VALUES (LPAD('".$IdPersona."',11,'0'),
        '".$IdPersona."',
        '".$POST['Ingreso']."',
        '".$POST['Egreso']."',
        '".$POST['PIngreso']."',
        '".$POST['PEgreso']."',
        '".$POST['CicloRelativo']."',
        '".$POST['IdCarrera']."',
        '".$rr."',
        '".$USER."'
        )";
        $this->Insert($Sql);
        /*
        Ingreso
        Egreso
        Carreras
        Institucion_Origen
        Carreta_profecional
        EstadoDocente
        */ 

        return   $IdPersona;
        
    }

    public function GeneraUsuario($POST,$IdPersona){

     
        

        $Nombre = substr($POST['Nombres'], 0, 1);
        $Apellidos = substr($POST['Apellido'], 0, 5);
        $Dni=substr($POST['NumDocumento'], 0, 2);
        $NombreUsuario = trim($Nombre.$Apellidos.$Dni);
        $rr=date("Y/m/d H:i:s");
        $USER='EFLORIAN';

            echo $Sql="INSERT INTO `usuario_tbl`(
                `IDPERSONA`,
                `NOM_USUARIO`,
                `PASS_USUARIO`,
                `TIPO_USUARIO`,
                `DATE_CREATE`,
                `USER_CREATE`) VALUES ('".$IdPersona."','".$NombreUsuario."','".$POST['NumDocumento']."','Alumno','".$rr."','".$USER."' )";

            $this->Insert($Sql);

            return $NombreUsuario;

    

    }
    

    public function DatosAlumnosActivacion($POST){
        //IdAlumno,'Documento':Documento,'Periodo':Periodo
        $IdAlumno=$_POST['IdAlumno'];
        $Documento=$_POST['Documento'];
        $Where='';
        if($IdAlumno!='' AND $Documento!='')
        {
            $Where="  WHERE A.IDALUMNO'$IdAlumno' AND A.NUM_DOCUMENTO='$Documento' ";
        }else {
            if($IdAlumno!=''){
                $Where="  WHERE A.IDALUMNO='$IdAlumno'";
            }elseif($Documento!=''){
                $Where="  WHERE  A.NUM_DOCUMENTO='$Documento' ";
            }

            
        }

        
       /*echo $sql="SELECT  A.* From (SELECT A.IDALUMNO,A.IDPERSONA,B.NOMBRES,B.APELLIDOS,B.NUM_DOCUMENTO FROM alumno_tbl A inner JOIN datos_personales_tbl B
        ON A.IDPERSONA=B.IDPERSONA)  A  $Where"; */

        $sql="SELECT  A.*,AC.IDREGISTRO,AC.IDCARRERA,AC.PERIODO,AC.ESTADO From (SELECT A.IDALUMNO,A.IDPERSONA,B.NOMBRES,B.APELLIDOS,B.NUM_DOCUMENTO FROM alumno_tbl A 
        inner JOIN datos_personales_tbl B ON A.IDPERSONA=B.IDPERSONA)  A 
        left JOIN   activacion_alumno AC on A.IDALUMNO=AC.IDALUMNO AND AC.PERIODO='".$POST['Periodo']."'  $Where "; 
        return  $this->SelectArray($sql);

    }

    public function AtivacionCU($POST){
        $rr=date("Y/m/d H:i:s");
        $USER='EFLORIAN';
        if($POST['IdRegistro']=='')
        {
            $Sql="INSERT INTO `activacion_alumno`
                ( `IDALUMNO`, `IDCARRERA`, `PERIODO`, 
                    `ESTADO`, 
                    `DATE_CREATE`, 
                    `USER_CREATE`
                    ) 
                VALUES ('".$POST['IdAlumno']."',
                '".$POST['IdCarrera']."','".$POST['Periodo']."',
                '".$POST['Estado']."','". $rr."','".$USER."')"; 
                $this->Insert($Sql);
                return mysqli_insert_id($this->Conexion);
        }
        else {
            $Sql="UPDATE  `activacion_alumno`
                    SET IDALUMNO='".$POST['IdAlumno']."'
                    ,IDCARRERA='".$POST['IdCarrera']."'
                    ,PERIODO='".$POST['Periodo']."'
                    ,ESTADO='".$POST['Estado']."'
                    ,DATE_UPDATE='". $rr."'
                    ,USER_UPDATE='".$USER."'
               WHERE 
               IDREGISTRO='".$POST['IdRegistro']."' ";
               $this->Insert($Sql);
            }
        
    }
}

?>