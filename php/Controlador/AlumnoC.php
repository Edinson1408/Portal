<?php
/*Controlador  
GitHub:Edinson1408
email: edinsoncarlosflorian@gmial.com
*/
require '../Modelo/AlumnosM.php';

/*class CarreraC extends */

 class AlumnosC extends AlumnosM
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
        $IdPersona=$this->AgregaAlumno($POST);
        echo 'hola';
        $GeneraUsuario=$POST['GeneraUsuario'];
        if ($GeneraUsuario='SI') {
            echo 'hola';
            //funcion genera Usuario
            echo $this->GeneraUsuario($POST,$IdPersona);
        }
    }

    public function Activacion($POST)
    {
            echo 'obtener los datos del alumno registrado para su activacioon';
    }


}

$Obje=new AlumnosC();

switch ($_POST['Peticion']) {
    case 'Vista':
        $vita=$Obje->Vista($_POST);
        echo $vita;
        break;
    
    case 'Agregar':
        $vita=$Obje->Agregar($_POST);
        break;
    case 'Activacion' :
        $vita=$Obje->Activacion($_POST);
    break;

    default:
        # code...
        break;
}

?>