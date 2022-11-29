<?php
include 'includes/conecta.php';
$idEncargado = $conecta->real_escape_string(($_POST['id']));
$nuevaContrasenia = $conecta->real_escape_string(md5($_POST['con']));

$actualizar = "UPDATE establecimiento SET Password_Encargado = '$nuevaContrasenia' WHERE Id_Establecimiento = $idENcargado";
$conecta -> query($actualizar);
?>