<?php

require '../config/conexion.php';

if($_POST['accion'] == 'Actualizar'){

    try {
        //code...
        $id = $con->real_escape_string($_POST['id']);
        $name = $con->real_escape_string($_POST['name']);
        $description = $con->real_escape_string($_POST['description']);
        $genre = $con->real_escape_string($_POST['genre']);
        $imgEdit = $_POST['imgEdit'];
        $img = $_FILES['post']['name'];
        $imgTemp = $_FILES['post']['tmp_name'];
        $type = $_FILES['post']['type'];
        $dir = "uploads/";
        //validamos si la imagen existe
        if (file_exists($dir.$id.$imgEdit) AND $imgEdit <> "") {
            echo "entro osea que si la encontro". $imgEdit;
            //eliminamos la imagen anterior
            unlink($dir.$id.$imgEdit);
        }
        if ($type == 'image/jpeg' || $type == 'image/png'){
            if (move_uploaded_file($imgTemp, $dir.$id.$img)) {
                echo 'Archivo subido exitosamente.';
            } else {
                echo 'Error al subir el archivo.';
            }
        }
        $sqlUpdate = "UPDATE `movieso` SET `name`='$name',`description`='$description',`id_genre`='$genre',`img`='$img' WHERE id = '$id'";
        $response = $con->query($sqlUpdate);
        header("location: index.php");
    } catch (\Throwable $th) {
        //throw $th;
    }



}






?>