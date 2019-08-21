<?php
/*Controlador  
GitHub:Edinson1408
email: edinsoncarlosflorian@gmial.com
*/
require '../Modelo/DocenteM.php';

/*class CarreraC extends */

 class CDocente extends DocenteM
{
    

    public function Vista($POST){
        $NombreComponente=$POST['NombreComponente'];
        
        switch ($NombreComponente) {
            case 'Lista':
                    return $this->Lista();
                break;
            
            default:
                
                break;
        }

    }

    public function Agregar($POST){
        $IdPersona=$this->AgregaDocente($POST);
        $GeneraUsuario=$POST['GeneraUsuario'];
        if ($GeneraUsuario='SI') {
            //funcion genera Usuario
            echo $this->GeneraUsuario($POST,$IdPersona);
        }
    }


}

$Obje=new CDocente();

switch ($_POST['Peticion']) {
    case 'Vista':
        $vita=$Obje->Vista($_POST);
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