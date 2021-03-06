<!DOCTYPE html>
<?php session_start(); 
$usu = $_SESSION['usuario'];
$idexamen = $_SESSION['idexamen'];
$i = $_SESSION['i'];
$pregcont = $_SESSION['pregunta'];
$idalumno = $_SESSION['idalumno'];

?>

  <!-- conexión base de datos -->
  <?php
    $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $tildes = $conn->query("SET NAMES 'utf8'"); //Con esto muestra las tíldes

    /* Sacamos las id que necesitemos y las guardamos en variables */
    $consultapregunta = mysqli_query($conn, "SELECT id, pregunta, correcta, incorrecta1, incorrecta2, incorrecta3 FROM preguntas WHERE idexamen='$idexamen' AND id NOT IN (".implode(",",$pregcont).") ORDER BY RAND()");
    $pregunta = mysqli_fetch_array($consultapregunta);
    
  ?>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Herpic - Examen</title>

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
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../../img/examen.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
          <span class="subheading">Llevas <?php echo $i; ?> preguntas.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <?php
  //Abrimos un if para controlar el bucle que hemos creado manualmente
  if ($i < 10) {
  ?>

  <!-- preguntas -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <div class="post-preview">
          <a>
            <h2 class="post-title">
                <?php
                    echo "Pregunta: " . $pregunta['pregunta'];
                ?>
            </h2>
            <h3 class="post-subtitle">
            <?php
                      $resp = array($pregunta['correcta'], $pregunta['incorrecta1'], $pregunta['incorrecta2'], $pregunta['incorrecta3']);
                      shuffle($resp);
                      ?>
                      <form action="prueba.php" method="POST">
                        <?php for ($p=0; $p < 4 ; $p++) { ?>
                          <input type="radio" name="respuesta" value="<?php echo $resp[$p] ?>">
                              <?php
                                  print_r($resp[$p]);
                                  echo "<br>";
                              ?>
                          </input>
                        <?php 
                            //Fin del for
                            } ?>
                        </h3>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" id="sendMessageButton" name="siguiente" value="<?php echo $pregunta['id'] ?>">Siguiente</button>
                        </div>
                      </form>
        <hr>

  <?php
  //Cierre del if que hace el bucle
  }

  //Aqui abrimos otro if, que controla que ya tenemos 10 preguntas
  elseif ($i == 10) {
    ?>
    <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Prueba Finalizada.</p>
        <form name="sentMessage" novalidate action="notaprueba.php">
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Ver nota</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<hr>
<?php
// Aquí cerramos el elsif
  }
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
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="../../js/jqBootstrapValidation.js"></script>
  <script src="../../js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../../js/clean-blog.min.js"></script>

</body>
</html>