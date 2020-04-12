<!DOCTYPE html>
<?php session_start(); 
  $usu = $_SESSION['usuario'];
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Herpic - Home</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="../css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand"><img src="../img/logo.png" height="45" width="45"> Herpic</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../logout.php">CERRAR SESIÓN</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../img/profesor.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Bienvenido</h1>
            <span class="subheading">
            <?php
              echo $usu;
            ?>
            </span>
          </div>
        </div>
      </div>
    </div>
  </header>

    <!-- conexión base de datos -->
    <?php
    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $tildes = $conn->query("SET NAMES 'utf8'"); //Con esto muestra las tíldes

    /* Sacamos las id que necesitamos y las guardamos en variables*/
    $consultaprof = mysqli_query($conn, "SELECT id FROM profesores WHERE usuario='$usu'");
    $idprof = mysqli_fetch_array($consultaprof);
      //echo $idprof['id'];

    $consultacurso = mysqli_query($conn, "SELECT idcurso FROM cursos_profesores WHERE idprofesor='$idprof[id]'");


    /* Con las id que hemos sacado antes, sacamos el nombre del curso que imparte el profesor y el alumnó que está matriculado en el cusro */
    
  ?>

  <!-- Cursos matriculados -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <!-- bucle para mostrar todos los cursos  -->
      <?php
        while ($idcurso = mysqli_fetch_array($consultacurso)){
          $mostar_curso = mysqli_query($conn, "SELECT nombre FROM cursos WHERE id='$idcurso[idcurso]'");
          while ($reg = mysqli_fetch_array($mostar_curso)){
      ?>
        <div class="post-preview">
          <a>
            <h2 class="post-title">
            <?php
                echo $reg['nombre'];
              ?>
            </h2>
            <h3 class="post-subtitle">
            <?php
              //while ($reg2 = mysqli_fetch_array($mostar_alumno)){
                //echo $reg2['apellidos'] . ", " . $reg2['nombre'];
                //echo "<br>";
              //}
            ?>
            </h3>
          </a>
          <form action="cursoprof.php" method="POST">
              <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton" name="mostrar" value="<?php echo $idcurso['idcurso'] ?>">Mostrar</button>
              </div>
            </form>
        </div>
        <hr>
      <?php
      }
    }
      mysqli_close($conn);  
      ?>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="https://twitter.com/Herpico">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://github.com/Carlos-DR/ProyectoPASIR">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Carlos Domínguez 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/clean-blog.min.js"></script>

</body>
</html>