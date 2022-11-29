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
    <link rel="stylesheet" href="css/style-detallesProductoAdmin.css">
    <link href='https://fonts.googleapis.com/css?family=Literata' rel='stylesheet'>
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="css/stylesInd.css" rel="stylesheet">
  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="shortcut icon"type="image/x-icon" href="images/favicon.ico">
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
          $res = "SELECT * FROM establecimiento WHERE Id_Establecimiento = '$varsesion'";
          $resul=mysqli_query($conecta,$res);
          while($mos=mysqli_fetch_array($resul))
          {
          echo $mos['Nombres_Establecimiento'];
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
            <h1 class="text-center">ESTABLECIMIENTO <?php echo $_SESSION['Establecimiento'];?></h1>
            <hr>
        </div>
     </header>
     <section class="store">
        <div class="container">
            <div class="items">
                <div class="row">
                    <div class="col-25 col-md-12">
                    <?php
                        $sql= "SELECT * FROM producto WHERE id_Producto  = $id LIMIT 1";
                        $resultado=mysqli_query($conecta,$sql);
                            while($mostrar=mysqli_fetch_array($resultado))
                            {
                            ?>  
                        <div class="item shadow mb-4">
                            <h3 class="item-title">pollo al Spiedo</h3>
                            <div class="item-img">
                              <img src = "images/pollo1.jpg" class="img-fluid" alt="" height="1000" width="500">
                               <div class="text-align-rigth">
                                <br><h4> <!--<div class="cuadrado" class="coo" >
                                    
                                    <br><i class="bi bi-check-circle-fill"></i>Te presentamos las mejores presas  de pollo como ser de media y entera.</br>
                                    <br><i class="bi bi-check-circle-fill"></i> Los mejores precios economico con varias clasificaciones de platos.</br>
                                    <br><i class="bi bi-check-circle-fill"></i>Con una gran porcion de arroz como tambien de papas fritas con aderesos deliciosos.</br>
                                    </div>-->
                                    Informaciones
                               </h4></br>
                               <h5>
                                <textarea name="comentarios"  class="comentarios"rows="10" cols="40">Escribe aquí tus comentarios</textarea>
                               </h5>
                                    
                                  
                                
                                
                            </div>
                            </div>
                            
                            <div class="item-details">
                                    <div class="lh-sm text-align-rigth ">
                                    <h3>Precio: <label for="tentacles"></label>

                                      <input type="number" id="tentacles" name="tentacles"
                                             min="1" max="100"> Bs.</h3>
                                    <h3>Tiempo Disponible hasta: <input type="datetime-local" class="Tiempo_Disponible" name="date" size="100"> del dia de hoy.</h3>
                                    <h3>Cantidad Disponible:<label for="tentacles"></label>

                                      <input type="number" id="tentacles" name="tentacles"
                                             min="1" max="100">Unidades.</h3>
                                             <div class="text-center">
                                    <button type="button" href="catalogoAdmin.php" class="btn btn-danger text-center ">Atras</button> 
                                    <button type="button" href="catalogoAdmin.php" class="btn btn-danger text-center ">Guardar</button>  
                            </div>              
                                    </div>    
                            </div>
                        </div>
                        <?php
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