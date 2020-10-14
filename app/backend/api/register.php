<?php
header('Access-Control-Allow-Origin: *');
include_once 'config/cors.php';
include_once 'config/dbh.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $data= json_decode(file_get_contents("php://input"));

    $nombre     = $data->nombre;
    $correo     = $data->correo;
    $pass=$data->pass;
    
    $hashed = password_hash($pass, PASSWORD_DEFAULT);
    $sql = $conn ->query("INSERT INTO us_mov(us_nom, us_corr,us_pass)values ('$nombre', '$correo', '$pass')");
    if ($sql){
        http_response_code(201);
        echo json_encode(array('message' => 'Usuario Creado'));
    }else{
        http_response_code(500);
        echo json_encode(array('message' => 'Error interno en el servidor'));
    }

}