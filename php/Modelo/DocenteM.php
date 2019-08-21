<?php 
/*Incluir las conexiones*/
require 'PersonaM.php';
class DocenteM extends PersonaM
{
    
    function Lista()
    {
        $sql="
        SELECT doc.IDDOCENTE, per.NOMBRES as NOM, per.APELLIDOS as APE, doc.CARRERA_PROFESIONAL as CARRERA
		FROM datos_personales_tbl as per, docentes_tbl as doc
		WHERE doc.IDPERSONA=per.IDPERSONA";
        return  $this->SelectArray($sql);
    }

    public function AgregaDocente($POST){
       $IdPersona=$this->AgregaPersona($POST);
        $rr=date("Y/m/d H:i:s");
        $USER='EFLORIAN';
        /*
        SELECT LPAD('34',5,'0') FROM DUAL;
        */
        echo $Sql="INSERT INTO   `docentes_tbl`(
          `IDDOCENTE`,
         `IDPERSONA`,
         `ANO_INGRESO`,
         `ANO_EGRESO`,
         `IDCARRERA`,
         `INSTITUCION_PROCEDENCIA`,
         `CARRERA_PROFESIONAL`,
         `ESTADO`,
         `DATE_CREATE`,
         `USER_CREATE`
         )
        VALUES (LPAD('".$IdPersona."',11,'0'),
        '".$IdPersona."',
        '".$POST['Ingreso']."',
        '".$POST['Egreso']."',
        '".$POST['Carreras']."',
        '".$POST['Institucion_Origen']."',
        '".$POST['Carreta_profecional']."',
        '".$POST['EstadoDocente']."',
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
                `USER_CREATE`) VALUES ('".$IdPersona."','".$NombreUsuario."','".$POST['NumDocumento']."','Docente','".$rr."','".$USER."' )";

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