<?php
include 'includes/conecta.php';
$idCliente = $conecta->real_escape_string($_POST['id']);
$nuevaContrasenia = $conecta->real_escape_string(md5($_POST['con']));

$actualizar = "UPDATE clientes SET Password_Cliente = '$nuevaContrasenia' WHERE Id_Clientes = $idCliente";
$conecta -> query($actualizar);
?>