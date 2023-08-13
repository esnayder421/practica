<?php

require '../config/conexion.php';

if($_POST["id"]){

    $id = $con->real_escape_string($_POST['id']);

    $sqlGetId = "SELECT * FROM movieso WHERE id = $id LIMIT 1";

    $resultado = $con->query($sqlGetId);
    $rows = $resultado->num_rows;

    $movies = [];

    if( $rows > 0){
        $movies = $resultado->fetch_array();
    }

    echo json_encode($movies, JSON_UNESCAPED_UNICODE);

}


?>