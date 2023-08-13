<?php

require '../config/conexion.php';

//if($_POST["accion"] == 'eliminar'){

    $id = $con->real_escape_string($_POST['id']);
    //echo $id;
    $sqlDelete = "DELETE FROM movieso WHERE id='$id'";

    $resultado = $con->query($sqlDelete);
    echo "Pelicula Eliminada exitosamente"
    //header("location: index.php");
    //$rows = $resultado->num_rows;

    //echo json_encode($movies, JSON_UNESCAPED_UNICODE);

//}


?>