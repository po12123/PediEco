<?php
error_reporting(0);
session_start();
include 'includes/conecta.php';
//$usuario = $_SESSION['Usuario'];
//if(isset($_SESSION['Usuario']) || isset($_POST['id'])){
//    echo "hola";
//    if(isset($_SESSION['Usuario'])){
        $usuario = $_SESSION['Usuario'];
//        if(isset($_POST['id'])){
            $id= $conecta -> real_escape_string($_POST['id']);
            $precio= $conecta -> real_escape_string($_POST['pre']);
            $cantidad= $conecta -> real_escape_string($_POST['can']);
            $consulta = "SELECT * FROM carrito WHERE Id_Clientes = '$usuario' and Id_Producto = '$id'";
            $montoTotal = $cantidad*$precio;
            if($resultado = $conecta->query($consulta)){
                while($row = $resultado->fetch_array()){
                    $idok = $row['id_Producto'];
                    $cantidadok = $row['Cantidad_X_Producto'];
                }
                $resultado->close();
            }
            if($id == $idok){
                //$cantidad = $cantidad + ($cantidad-$cantidadok);
                $consulta = "UPDATE carrito SET Cantidad_X_Producto = '$cantidad', MontoTotal_X_Producto = '$montoTotal' WHERE Id_Clientes = '$usuario' and id_Producto = '$id'";
                if($resultado = $conecta->query($consulta)){
                    $resultado->close();
                }
            }
            else{
                $consulta = "INSERT INTO carrito (id_Producto, Id_Clientes, Cantidad_X_Producto, MontoTotal_X_Producto) VALUES ('$id','$usuario', '$cantidad','$montoTotal')";
                if($resultado = $conecta->query($consulta)){
                    $resultado->close();
                }
            }

//        }
//    }
//}
/*$id= $conecta -> real_escape_string($_POST['id']);
$precio= $conecta -> real_escape_string($_POST['pre']);
$cantidad= $conecta -> real_escape_string($_POST['can']);*/
//$montoTotal=$cantidad*$precio
/*$insertar = "INSERT INTO carrito (Id_Producto, Id_Clientes, Cantidad_X_Producto, MontoTotal_X_Producto) 
values ('$id','$usuario', '$cantidad','$precio')";
$conecta -> query($insertar);*/
?>