<?php 
/*Incluir las conexiones*/
require '../Config/Conexion.php';
class PersonaM extends Conexion
{
    


    public function AgregaPersona($POST){
        $rr=date("Y/m/d H:i:s");
        $USER='EFLORIAN';
        echo $Sql="INSERT INTO  datos_personales_tbl ( 
        `NOMBRES`, 
        `APELLIDOS`, 
        `EDAD`, 
        `IDDOCUMENTO`, 
        `NUM_DOCUMENTO`,
        `DIRECCION`,
        `PAIS`, 
        `PROVINCIA`,
        `DISTRITO`, 
        `IDIOMA`, 
        `F_NACIMIENTO`, 
        `DATE_CREATE`,
        `USER_CREATE` 
        )
        VALUES (
            '".$POST['Nombres']."',
            '".$POST['Apellido']."',
            '".$POST['Edad']."',
            '".$POST['TipoDocumento']."',
            '".$POST['NumDocumento']."',
            '".$POST['Direccion']."',
            '".$POST['Pais']."',
            '".$POST['Provincia']."',
            '".$POST['Distrito']."',
            '".$POST['Idioma']."',
            '".$POST['FNacimiento']."',
            '".$rr."',
            '".$USER."'
        )";
        /*
        Nombres
        Apellido
        Edad
        TipoDocumento
        NumDocumento
        Direccion
        Pais
        Provincia
        Distrito
        Idioma
        FNacimiento
        */
        $this->Insert($Sql);
        return mysqli_insert_id($this->Conexion);
    }
}

?>