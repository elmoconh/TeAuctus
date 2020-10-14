<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
/*include_once '../vendor/autoload.php';
include_once 'config/cors.php'; */
function conexion() {
  $conexion = mysqli_connect('localhost', 'root', '', 'musauc');
  
  return $conexion;
}

$json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
 
$params = json_decode($json); // DECODIFICA EL JSON Y LO GUARDA EN LA VARIABLE
 
$conexion = conexion(); // CREA LA CONEXION
  
// REALIZA LA QUERY A LA DB
$resultado = mysqli_query($conexion, "SELECT * FROM us_mov WHERE us_corr='$params->email' AND us_pass='$params->password'");

class Result {}
  
  // GENERA LOS DATOS DE RESPUESTA
  $response = new Result();
  
  if($resultado->num_rows > 0) {
      $response->resultado = 'OK';
      $response->mensaje = 'LOGIN EXITOSO';
      $response->usuario = $params->email;

  } else {
      $response->resultado = 'FAIL';
      $response->mensaje = 'LOGIN FALLIDO';
      $response->usuario = $params->email;

  }
  
  header('Content-Type: application/json');
  
  echo json_encode($response); // MUESTRA EL JSON GENERADO

    //SELECT * FROM us_mov WHERE us_corr='$params->email' AND us_pass='$params->password'