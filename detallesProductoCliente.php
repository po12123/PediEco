<?php include('includes/conecta.php');
session_start();
$id=$_GET['id'];
$varsesion = $_SESSION['Usuario'];
if($varsesion == null || $varsesion == ''){
    header("location:login.php");
    die();
}
if($id==""){
    header("location:catalogoAdmin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-detallesProductoCliente.css">
    <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="css/stylesInd.css" rel="stylesheet">
  <link rel="shortcut icon"type="image/x-icon" href="images/favicon.ico">
    <title>Descripcion</title>
</head>

<body>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">PediEco</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a id="x" class="active " href="#">Usuario: 
          <?php
          $res = "SELECT * FROM clientes WHERE Id_Clientes = '$varsesion'";
          $resul=mysqli_query($conecta,$res);
          while($mos=mysqli_fetch_array($resul))
          {
          echo $mos['Nombres_Cliente'];
          echo ' ';
          echo $mos['Apellidos_Cliente'];
          }
          ?>
          </a></li>
          <li><a id="y" class="" href="logout.php">Cerrar Sesión</a></li>
          </a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a style="display: none;" id="botonIniciarSesion" href="login.php" class="get-started-btn">
        <b>Iniciar Sesión</b> 
      </a>
        
      <div style="display: none;" id="contenedorBotonUser" class="desplegable">
        <button class="desplebutton">
          <a href="#l" id="prueba" class="get-started-btn">
            cargando...
            <i class="fas fa-chevron-down"></i>
          </a> </button>
        <!-- <i class="material-icons">expand_more </i>  -->
        <div class="options">

          <a href="#" id="logout">Cerrar Sesion</a>
        </div>
      </div>

    </div>
  </header>
    <div>
        <div class="container">
            <h1 class="text-center">PEDIECO</h1>
            <h1 class="text-center">PEDIDOS <?php echo $_SESSION['Establecimiento'];?></h1>
            <hr>
        </div>
    </div>
    <section class="store">
        <div class="container">
            <div class="items">
                <div class="row">
                    <div class="col-25 col-md-12">
                    <?php
                                //echo $usuario;
                                $sql= "SELECT * FROM producto WHERE Id_Producto=$id LIMIT 1";
                                $consulta = "SELECT * FROM carrito WHERE Id_Clientes = $varsesion and Id_Producto = $id";
                                $resultado=mysqli_query($conecta,$sql);  
                                $resultado2=mysqli_query($conecta,$consulta);  
                                $resultado3 = mysqli_query($conecta,$sql);  
                                while($mostrar=mysqli_fetch_array($resultado))
                                {
                                    $datosEstab = "SELECT * FROM establecimiento WHERE Id_Establecimiento = $mostrar[Id_Establecimiento]";
                                    if($result = $conecta->query($datosEstab)){
                                        while($row = $result->fetch_array()){
                                        $nombreEstab = $row['Nombres_Establecimiento'];
                                        } 
                                
                                    $result->close(); 
                                } 

                                while($mostrar2=mysqli_fetch_array($resultado3))
                                {
                                    $consult = "SELECT * FROM carrito WHERE Id_Clientes = $varsesion and Id_Producto = $id";
                                    if($resulta = $conecta->query($consult)){
                                        while($row2 = $resulta->fetch_array()){
                                        $resulta2 = $row2['Cantidad_X_Producto'];
                                        } 
                                
                                    $resulta->close(); 
                                } 
                              
                                ?>  
                        <div class="item shadow mb-4">
                            <h3 class="item-title"><?php echo $mostrar['Nombres_Producto'] ?></h3>
                            <div class="item-img">
                                <img class="item-image"  src="data:image/png;base64,<?php echo  base64_encode($mostrar['Imagen_Producto']); ?>">
                               <div class="col-6">
                               <img class="centro" src="https://media4.giphy.com/media/lZKxVLKam8SssgY5SG/200w.gif?cid=82a1493bfy4iqpy5401lw233e8tb262xsszo5tfnlj58szzp&rid=200w.gif&ct=g">
                                <!--<caption>Informaciones</caption>-->
                                <h6><?php echo $mostrar['Descripcion_Producto'] ?></h6>
                              
                            </div>
                           </div>
                          
                                    <div class="lh-sm text-align-rigth ">
                                    <h4><b>Establecimiento:</b> <?php echo $nombreEstab ?></h4>
                                    <h4><b>Precio</b>: <?php echo $mostrar['Precio_Producto'] ?> <b>Bs.</b></h4>
                                    <h4><b>Tiempo Disponible hasta:</b> <?php echo $mostrar['Tiempo_Disponible'] ?> del dia de hoy.</h4>
                                    <h4><b>Cantidad Disponible:</b> <?php echo $mostrar['Cantidad_Producto']?> <b>Uni.</b></h4>
                                    <input type="number" min="1" class="formulario_input" value = "<?php echo $resulta2;?>" name="cant" id="cant" placeholder="Ingrese la cantidad">
                                    <br></br>
                              </div>
                             
                            
                              <div
                                class="text-center">
                                    <a href="catalogo.php" class="item-button btn btn-danger text-center addToCart" >Atras</a>          
                                    <a href="carrito.php"  class="item-button btn btn-danger text-center addToCart">Agregar al carrito</a>    
                                </div>   
                            </div>
                        </div>
                        <?php
                        }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="vendor/aos/aos.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/purecounter/purecounter.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>
<script src="js/script-agregarProducto.js" defer ></script>
<script src="js/main.js"></script>
<script>

    window.addEventListener('scroll', () => {
      const scrolled = window.scrollY;

      console.log(scrolled);
      if (scrolled < 500) {
        y.classList.remove('active')
        x.classList.add('active')
      }
      if (scrolled > 500) {
        y.classList.add('active')
        x.classList.remove('active')
      }

    })

  </script>
</html>