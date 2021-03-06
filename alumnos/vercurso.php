<?php session_start(); 
  $usu = $_SESSION['usuario'];
  $idcurso = $_POST['acceder'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Herpic - Alumno</title>

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

  <!-- conexión base de datos -->
  <?php
    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $tildes = $conn->query("SET NAMES 'utf8'"); //Con esto muestra las tíldes

    /* Sacamos las id que necesitemos y las guardamos en variables */
    $consultacurso = mysqli_query($conn, "SELECT nombre FROM cursos WHERE id='$idcurso'");
    $curso = mysqli_fetch_array($consultacurso);
      //echo $curso['nombre'];

    $consultaalumno = mysqli_query($conn, "SELECT id FROM alumnos WHERE usuario='$usu'");
    $alumno = mysqli_fetch_array($consultaalumno);
      //echo $alumno['id'];

    $consultaexamen = mysqli_query($conn, "SELECT id, tema, temanum, mixto FROM examenes WHERE idcurso='$idcurso' AND publico=1 ORDER BY temanum");
    
    
  ?>

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
            <a class="nav-link" href="alumno.php">Atrás</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../logout.php">CERRAR SESIÓN</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../img/vercurso.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>
                <?php
                    echo $curso['nombre'];
                ?>
            </h1>
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

  <!-- Cursos matriculados -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
  <!-- bucle para mostrar todos los cursos  -->
      <?php
      //Si no hay exámenes, apararece el mensaje de que no hay exámenes disponibles
      while ($examenes = mysqli_fetch_array($consultaexamen)){
      ?>
      <div class="post-preview">
          <a>
            <h2 class="post-title">
              <?php
                echo "Título: " . $examenes['tema'];
              ?>
            </h2>
            <h3 class="post-subtitle">
              <?php
                echo "<b>Tema: </b>" . $examenes['temanum'];
                  $consultanota = mysqli_query($conn, "SELECT nota, hecho FROM notas WHERE idexamen='$examenes[id]' AND idalumno='$alumno[id]'");
                  $nota = mysqli_fetch_array($consultanota);
                    //echo $nota['nota'];
                if (isset($nota) && $nota['hecho'] == 1) {
                  echo "<br><b>Nota: </b>" . $nota['nota'];
                }
              ?>
            </h3>
          </a>
          <hr>
          <?php
            if (!isset($nota)) {
          ?>
            <form action="./examenes/hacerexamen.php" method="POST">
              <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton" name="examen" value="<?php echo $examenes['id'] ?>">Hacer examen</button>
              </div>
            </form>
            <?php
              //IF para que no aparezca el botón de hacer prueba cuando el examen sea mixto
              if ($examenes['mixto'] == 0) {
            ?>
            <form action="./pruebas/hacerprueba.php" method="POST">
              <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton" name="prueba" value="<?php echo $examenes['id'] ?>">Hacer prueba</button>
              </div>
            </form>
            <?php
              }
            ?>
        </div>
        <hr>
      <?php
            }
      }
      mysqli_close($conn);
      ?>
      <!-- Botón corregir examen -->
        <div class="post-preview">
        <form action="alumno.php" method="POST">
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Atrás</button>
          </div>
        </form>
      </div> 

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