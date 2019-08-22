<?php

session_start();
require 'Conexion.php';

class Control extends Conexion 
{
    public function ControlLogin($User,$Pass){
        //echo $User;
        //echo $Pass;
        $_SESSION['USUARIO']=$User;
        
        $Sql="SELECT A.NOM_USUARIO,B.NOMBRES,B.APELLIDOS,A.TIPO_USUARIO FROM `usuario_tbl` A 
        LEFT JOIN datos_personales_tbl B ON A.IDPERSONA=B.IDPERSONA 
        where A.NOM_USUARIO='$User' AND A.PASS_USUARIO='$Pass'";
        $Array=$this->SelectArray($Sql);
        echo $Array;
    }
}

$Control=new Control();


switch ($_POST['Control']) {
    case 'Login':
        $Control->ControlLogin($_POST['User'],$_POST['Pass']);
        break;
    
    default:
        # code...
        break;
}





?>