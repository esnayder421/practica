<?php

$con = new mysqli("localhost","root","","cinemacrud");

if($con->connect_error){

    die("Error de conexion" . $con->connect_error);

}

?>