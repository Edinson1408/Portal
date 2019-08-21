
<?php 
/*Incluir las conexiones*/
//Utlis.php
require '../Config/Conexion.php';
class UtlisM extends Conexion
{
    public function ValidaDuplicados($Valor,$Tabla,$Campo){
         $Sql="SELECT * FROM $Tabla WHERE $Campo = '$Valor' ";
        $Query=$this->SelectArray($Sql);
        echo json_encode($Query);
    }    

    public function ArmaSelect($Tabla,$Id,$Des){
            $Sql="SELECT $Id,$Des FROM $Tabla";
            $Query=$this->SelectArray($Sql);
            return json_encode($Query);
    }
}

$Objeto= new UtlisM();

switch ($_POST['Peticion']) {
    case 'ValidaDuplicados':
        $Objeto->ValidaDuplicados($_POST['Valor'],$_POST['Tabla'],$_POST['Id']);
        break;
    case 'ArmaSelect':
        $selec=$Objeto->ArmaSelect($_POST['Tabla'],$_POST['Id'],$_POST['Des']);
        echo $selec;
        break;
    default:
        # code...
        break;
}

?>

