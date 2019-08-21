<?php
/*Controlador  
GitHub:Edinson1408
email: edinsoncarlosflorian@gmial.com
*/
require '../Modelo/AlumnosM.php';

/*class CarreraC extends */

 class CAlumno extends AlumnosM
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
        $this->AgregaDocente($POST);
    }


}

$Obje=new CAlumno();

switch ($_POST['Peticion']) {
    case 'Lista':
        $vita=$Obje->Vista($_POST['Peticion']);
        echo $vita;
        break;
    
    case 'Agregar':
        $vita=$Obje->Agregar($_POST);
        break;
    
    default:
        # code...
        break;
}

?>