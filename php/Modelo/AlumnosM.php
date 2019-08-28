<?php 
/*Incluir las conexiones*/
require 'PersonaM.php';
class AlumnosM extends PersonaM
{
    
    function Lista()
    {
        $sql="
        SELECT doc.IDDOCENTE, per.NOMBRES as NOM, per.APELLIDOS as APE, doc.CARRERA_PROFESIONAL as CARRERA
		FROM datos_personales_tbl as per, docentes_tbl as doc
		WHERE doc.IDPERSONA=per.IDPERSONA";
        return  $this->SelectArray($sql);
    }

    public function AgregaAlumno($POST){
       $IdPersona=$this->AgregaPersona($POST);
       
        $rr=date("Y/m/d H:i:s");
        $USER='EFLORIAN';
        /*
        SELECT LPAD('34',5,'0') FROM DUAL;
        */
        $Sql="INSERT INTO   `alumno_tbl`(
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

        //**varchar(50) */
        /*$POST[''] 
        $POST['']*/
        

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

    /*IDUSUARIO
    IDPERSONA
    NOM_USUARIO
    PASS_USUARIO
    TIPO_USUARIO
    DATE_CREATE
    USER_CREATE
	DATE_UPDATE	
	USER_UPDATE*/

    }
    
}

?>