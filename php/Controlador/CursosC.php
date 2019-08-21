<?php
/*Controlador  
GitHub:Edinson1408
email: edinsoncarlosflorian@gmial.com
*/
require '../Modelo/CursoM.php';

/*class CarreraC extends */

 class CCurso extends CursoM
{
    

    public function Vista($NombreComponente){
        
        
        switch ($NombreComponente) {
            case 'Lista':
                    
                    return $this->Lista();
                        
                break;
            
            default:
                
                break;
        }

    }

    public function Agregar($POST){
        //$this->AgregaDocente($POST);
        print_r($POST);
    }

    public function Eliminar($POST){
        $this->EliminarCurso($POST);
    }


}

$Obje=new CCurso();

switch ($_POST['Peticion']) {
    case 'Lista':
        $vita=$Obje->Vista($_POST['Peticion']);
        echo $vita;
        break;
    
    case 'Agregar':
        $vita=$Obje->Agregar($_POST);
        break;
    case 'Actualizar':
        //$vita=$Obje->Actualizar($_POST);
        break;
    case 'Eliminar':
        $vita=$Obje->Eliminar($_POST);
        break;
    default:
        # code...
        break;
}

?>