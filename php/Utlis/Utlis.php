
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

    public function UploadFiel($POST,$FILES){

        //print_r($POST);
        print_r($FILES);

        /*Funcion para subir cualquier tipo de Archivo */
        if(!empty($POST['nombre']) || !empty($POST['dni']) || !empty($FILES['file']['name'])){
            $uploadedFile = '';
            if(!empty($_FILES["file"]["type"])){

                $temporary = explode(".", $_FILES["file"]["name"]);
                $file_extension = end($temporary);

                $fileName =$fileName = time().'_'.$_FILES['file']['name'];;
                //echo $fileName;
                $valid_extensions = array("jpeg", "jpg", "png");
                if((($FILES["file"]["type"] == "image/png") || ($FILES["file"]["type"] == "image/jpg") || ($FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
                    //echo 'subindo imagen';
                    $sourcePath = $_FILES['file']['tmp_name'];
                    echo '<br>';
                    echo $sourcePath;
                     $targetPath = "assets/".$fileName;
                     echo $targetPath;
                     //move_uploaded_file($sourcePath,$targetPath);
                                // if(move_uploaded_file($sourcePath,$targetPath)){
                                //     $uploadedFile = $fileName;
                                // }
                     }
                }
            }
            
            // $name = $_POST['name'];
            // $email = $_POST['email'];
            
            // //include database configuration file
            // include_once 'dbConfig.php';
            
            // //insert form data in the database
            // $insert = $db->query("INSERT form_data (name,email,file_name) VALUES ('".$name."','".$email."','".$uploadedFile."')");
            
            // echo $insert?'ok':'err';
            
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
    case 'SubirArchivo':
        $Objeto->UploadFiel($_POST,$_FILES);
        break;
    default:
        # code...
        break;
}



?>

