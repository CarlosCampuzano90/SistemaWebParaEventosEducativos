<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Sistema Web Para Eventos Educativos</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link class="icon" href="vistas/img/icono.png">

   <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 4.0 -->
  <link rel="stylesheet" href="vistas/bibliotecas/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bibliotecas/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vistas/bibliotecas/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="vistas/dist/css/estilos.css">
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">



  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->



  <!-- jQuery 3 -->
  <script src="vistas/bibliotecas/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 4.0 -->
  <script src="vistas/bibliotecas/bootstrap/js/bootstrap.min.js"></script>
  
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/plantilla.min.js"></script>

</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page" id="bodyGeneral">


  <?php
    $admin=new ControladorPagina();
    $admin -> ctrModulos();
    $admin -> ctrParticipante();
  ?>



<script type="text/javascript" src="vistas/js/sii.js"></script>
<script type="text/javascript" src="vistas/js/app.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>
</html>
