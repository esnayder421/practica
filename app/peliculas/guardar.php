<?php

require '../config/conexion.php';

//if($_POST["accion"] == "guardar"){
    try {
        //code...
        $name = $_POST['name'];
        $description = $_POST['description'];
        $genre = $_POST['genre'];
        $dir = "uploads/";
        $img = $_FILES['post']['name'];
        $imgTemp = $_FILES['post']['tmp_name'];
        $type = $_FILES['post']['type'];
    
        $sqlInsertMov = "INSERT INTO `movieso`(`id`, `name`, `description`, `id_genre`, `date`, `img`) VALUES (NULL,'$name','$description',$genre,NOW(), '$img')";
        if($con->query($sqlInsertMov)){
            if(!file_exists($dir)){
                mkdir($dir,0777);
            }
            $id = $con->insert_id;
            if ($type == 'image/jpeg' || $type == 'image/png'){
                if (move_uploaded_file($imgTemp, $dir.$id.$img)) {
                    echo 'Archivo subido exitosamente.';
                } else {
                    echo 'Error al subir el archivo.';
                }
            }

        }
        //header("location: index.php");
        echo "Se registro correctamente";
    } catch (\Throwable $th) {
        echo $th;
        throw $th;
       
    }
   
//}


?>