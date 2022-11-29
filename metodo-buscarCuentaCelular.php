<?php
//este php verifica si un correo ya esta registrado
error_reporting(0);
session_start();
include 'includes/conecta.php';
$ver = "-1:-1";
$usuario = $conecta->real_escape_string($_POST['user']);
$usuario2 =  $conecta->real_escape_string($_POST['user']);
$celular = $conecta->real_escape_string(($_POST['cel']));
$celular2 = $conecta->real_escape_string(($_POST['cel']));
// generar una consulta que extraigo los datos de la bd
$consulta = "SELECT * FROM clientes WHERE Email_Cliente = '$usuario' and NumeroCelular_Cliente = '$celular'";
$consulta2 = "SELECT * FROM establecimiento WHERE Email_Encargado = '$usuario2' and NumeroCelular_Encargado = '$celular2'";
if($resultado = $conecta->query($consulta)){
   while($row = $resultado->fetch_array()){
     $userok = $row['Email_Cliente'];
     $celularok = $row['NumeroCelular_Cliente'];
     $idok = $row['Id_Clientes'];
   }
   $resultado->close();
}
if($resultado2 = $conecta->query($consulta2)){
   while($row2 = $resultado2->fetch_array()){
    $userok2 = $row2['Email_Encargado'];
    $celularok2 = $row2['NumeroCelular_Encargado'];
    $idok2 = $row2['Id_Establecimiento'];
  }
  $resultado2->close();
}
$conecta->close();

if((isset($usuario) && isset($celular))||(isset($usuario2) && isset($celular2))){
  if($usuario == $userok &&  $celular == $celularok ){
    $ver =1;
    echo "$ver:$idok";
  }else{
    if($usuario2 == $userok2 && $celular2 == $celularok2){
      $ver =2;
      echo "$ver:$idok2";
    }
    else {
      $ver =0;
      echo "$ver:0";
       }
  }
}

?>