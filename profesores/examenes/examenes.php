<!DOCTYPE html>
<?php session_start(); 
  $usu = $_SESSION['usuario'];
  $idcurso = $_SESSION['idcurso'];
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Herpic - Home</title>

  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="../../css/clean-blog.min.css" rel="stylesheet">

</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand"><img src="../../img/logo.png" height="45" width="45"> Herpic</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="../profesor.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../../logout.php">CERRAR SESIÓN</a>
        </li>
        </ul>
      </div>
    </div>
  </nav>

<!-- conexión base de datos -->
<?php
    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $tildes = $conn->query("SET NAMES 'utf8'"); //Con esto muestra las tíldes

    /* Sacamos las id que necesitamos y las guardamos en variables*/
    $nombrecurso = mysqli_query($conn, "SELECT nombre FROM cursos WHERE id='$idcurso'");
    $curso = mysqli_fetch_array($nombrecurso);

    $consultaexamen = mysqli_query($conn, "SELECT id, tema, temanum, publico FROM examenes WHERE idcurso='$idcurso'");

  ?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../../img/examenes.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>EXÁMENES</h1>
            <span class="subheading">
            <?php
                echo "Exámenes del curso " . $curso['nombre'];
            ?>
            </span>
          </div>
        </div>
      </div>
    </div>
  </header>


  <!-- Exámenes disponibles para el curso -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <!-- bucle para mostrar todos los cursos  -->
        <?php
            while ($examen = mysqli_fetch_array($consultaexamen)){
            ?>
        <div class="post-preview">
          <a>
            <h2 class="post-title">
            <?php
                echo $examen['tema'] . ", Tema: " . $examen['temanum'];
              ?>
            </h2>
            <h3 class="post-subtitle">
            <?php
                if ($examen['publico'] == 0) {
                    echo "Estado del examen: NO PUBLICADO";
                }
                elseif ($examen['publico'] == 1) {
                    echo "Estado del examen: PUBLICADO";
                }
                else {
                    echo "ha dao un caske xD";
                }
              ?>
            </h3>
            <div class="post-preview">
                <form action="verexamen.php" method="POST">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton" name="ver" value="<?php echo $examen['id']?>">Ver examen</button>
                    </div>
                </form>
            </div>
            <div class="post-preview">
                <form action="dropexamen.php" method="POST">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton" name="borrar" value="<?php echo $examen['id']?>">Borrar examen</button>
                    </div>
                </form>
            </div>
            <?php
                if ($examen['publico'] == 0) {
                
            ?>
            <div class="post-preview">
                <form action="publicar.php" method="POST">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton" name="publico" value="<?php echo $examen['id']?>">Publicar examen</button>
                    </div>
                </form>
            </div>
            <?php
            }
            elseif ($examen['publico'] == 1) {
            ?>
            <div class="post-preview">
                <form action="publicar.php" method="POST">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendMessageButton" name="publico" value="<?php echo $examen['id']?>">Ocultar examen</button>
                    </div>
                </form>
            </div>
            <?php
            }
            ?>
          </a>
        </div>
        <hr>
      <?php
            } 
      ?>
      <!-- bucle para mostrar todos los exámenes  -->
      <!-- En proceso -->
        <?php
          mysqli_close($conn);
        ?>
  <!-- Botón nuevo examen -->
      <div class="post-preview">
        <form action="temaexamen.php" method="POST">
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton" name="nuevo" value="<?php echo $idcurso?>">Nuevo Examen</button>
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
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../../js/clean-blog.min.js"></script>

</body>
</html>