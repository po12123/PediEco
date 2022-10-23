<?php
                include 'includes/conecta.php';
                if (isset($_REQUEST['guardar'])) {
                    if (isset($_FILES['foto']['name'])) {
                        $nombreProducto = $conecta -> real_escape_string($_POST['Nombre']);
                        $descripcionProducto = $conecta -> real_escape_string($_POST['Apellidop']);
                        $tiempoDisponible = $conecta -> real_escape_string($_POST['Telefono']);
                        $cantidadProducto = $conecta -> real_escape_string($_POST['Email']);
                        $precioProducto = $conecta -> real_escape_string($_POST['Password']);
                        $disponibleProducto = True;
                        $idestablecimiento = 1;
                        $tamanoArchivo = $_FILES['foto']['size'];
                        $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
                        $binariosImagen = fread($imagenSubida, $tamanoArchivo);
                        $binariosImagen = mysqli_escape_string($conecta, $binariosImagen);
                        $query = "INSERT INTO producto (Nombres_Producto, Descripcion_Producto, Tiempo_Disponible, Cantidad_Porducto, Precio_Producto ,Imagen_Producto, Disponible_Producto, Id_Establecimiento) values ('$nombreProducto','$descripcionProducto', '$tiempoDisponible', '$cantidadProducto', '$precioProducto','$binariosImagen','$disponibleProducto', '$idestablecimiento')";
                        $res = mysqli_query($conecta, $query);
                        if ($res) {
                ?>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                Registro insertado exitosamente
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                Error <?php echo mysqli_error($conecta); ?>
                            </div>
                <?php

                        }
                    }
                }
                ?>

<!doctype html>
<html lang="en">

<head>
    <title>Images</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="foto">
                        <input type="text" name="Nombre" placeholder="Nombre" class="form-control" required>
                   <input type="text" name="Apellidop" placeholder="Descripcion" class="form-control" required>
                   <input type="time" name="Telefono" placeholder="Tiempo" class="form-control" required>
                   <input type="number" name="Email" placeholder="Cantidad" class="form-control" required>
                   <input type="number" name="Password" placeholder="Precio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="guardar">Enviar</button>
              </div>
                </form>
                
              
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
