<?php
//este php verifica si un correo ya esta registrado
error_reporting(0);
session_start();
include 'includes/conecta.php';
$ver = 10;
$usuario = $conecta->real_escape_string($_POST['usuario']);
$usuario2 =  $conecta->real_escape_string($_POST['usuario']);
$password = $conecta->real_escape_string(md5($_POST['pass']));
$password2 = $conecta->real_escape_string(md5($_POST['pass']));
// generar una consulta que extraigo los datos de la bd
$consulta = "SELECT * FROM clientes WHERE Email_Cliente = '$usuario' and Password_Cliente = '$password'";
$consulta2 = "SELECT * FROM establecimiento WHERE Email_Encargado = '$usuario2' and Password_Encargado = '$password2'";
if($resultado = $conecta->query($consulta)){
   while($row = $resultado->fetch_array()){
     $userok = $row['Email_Cliente'];
     $passwordok = $row['Password_Cliente'];
     $idok = $row['Id_Clientes'];
   }
   $resultado->close();
}
if($resultado2 = $conecta->query($consulta2)){
   while($row2 = $resultado2->fetch_array()){
    $userok2 = $row2['Email_Encargado'];
    $passwordok2 = $row2['Password_Encargado'];
    $idok2 = $row2['Id_Establecimiento'];
    $nom2=$row2['Nombres_Establecimiento'];
  }
  $resultado2->close();
}
$conecta->close();

if((isset($usuario) && isset($password))||(isset($usuario2) && isset($password2))){
  if($usuario == $userok &&  $password == $passwordok ){
    $_SESSION['Usuario'] = $idok;
    $ver =1;
    echo "$ver:$idok";
  }else{
    if($usuario2 == $userok2 && $password2 == $passwordok2){
      $_SESSION['Usuario'] = $idok2;
      $_SESSION['Establecimiento'] = $nom2;
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