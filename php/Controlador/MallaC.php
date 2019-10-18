<?php
// $arrayName = array('Edinson' => '17');
// echo json_encode($_POST);
?>
<?php
/*Controlador  
GitHub:Edinson1408
email: edinsoncarlosflorian@gmial.com
*/
require '../Modelo/MallaM.php';

/*class CarreraC extends */

 class MallaC extends MallaM
{
    

    public function Vista($POST){
        echo json_encode($POST);
        $this->ValidaMalla($POST,$IdPersona);


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
            return $this->DatosAlumnosActivacion($POST);
    }

    public function ActivacionAgregarAtualizar($POST){
                return $this->AtivacionCU($POST);
    }


    

}

$Obje=new MallaC();

switch ($_POST['Peticion']) {
    case 'ValidaMalla':
         $vita=$Obje->Vista($_POST);
        // echo $vita;
        break;
    
    case 'Agregar':
        // $vita=$Obje->Agregar($_POST);
        break;
    case 'Activacion' :
        // $vita=$Obje->Activacion($_POST);
        // echo $vita;
    break;
    case 'AtivacionCU':
        // $vita=$Obje->ActivacionAgregarAtualizar($_POST);
        // echo $vita;
        break;

    default:
        # code...
        break;
}

?>