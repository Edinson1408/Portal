<?php
/*Controlador  
GitHub:Edinson1408
email: edinsoncarlosflorian@gmial.com
*/
require '../Modelo/InfoAlumnoM.php';

/*Solo sera infromativo aqui el alumno no podra agregar nada :V*/
 class InformacionALumnosC  extends InformacionALumnosM
{
    

    public function Vista($POST){
        $NombreComponente=$POST['NombreComponente'];
        switch ($NombreComponente) {
            case 'MisNotas':
                    return $this->MisNotas($POST);
                break;
            case 'MiMalla':
                //return $this->Lista();
            break;
            default:    
            break;
        }
    }

    


}

$Obje=new InformacionALumnosC();

switch ($_POST['Peticion']) {
    case 'Vista':
        $vita=$Obje->Vista($_POST);
        echo $vita;
        break;
    
    case 'Agregar':
        //$vita=$Obje->Agregar($_POST);
        break;
    
    case 'Actualizar':
        //$vita=$Obje->Actualizar($_POST);
        break;
    case 'Eliminar':
        //$vita=$Obje->Eliminar($_POST);
        break;
    default:
        # code...
        break;
}

?>