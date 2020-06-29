<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Estatísticas</title>
    <link rel="shortcut icon" href="../../Icons/estoque-favicon.png">

    <!-- Materialize Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Master Personal Css -->
    <link rel="stylesheet" href="Master.css">

    <!-- Importar Módulo de Conexão, Crud de Produtos e Crud de Logs -->
    <?php
      require '../Model/Conn.php';
      require '../Model/CrudProduto.php';
      require '../Model/CrudLog.php';
      require '../Controller/CrudProduto.php';
    ?>
  </head>
  <body>
    <nav>
      <div class="nav-wrapper">
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
          <li><a style="font-size:20px;" href="Estoque.php"><i class="material-icons left">arrow_back_ios</i>Voltar</a></li>
        </ul>
      </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
      <li class="margin"><p class="title2">ESTOQUE</p></li>
      <li><hr></li>
      <li class="margin"><a style="font-size:20px;" href="Estoque.php"><i class="material-icons left">arrow_back_ios</i>Voltar</a></li>
    </ul>

    <?php
      $instance = new \CrudProduto;
      $i = $instance->read(array("",""));
      print_r($i);
    ?>

    <!-- Jquery Js -->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.js"></script><style type="text/css"></style>
    <!-- Materialize JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <!-- Jquery Mask JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <!-- Init Materialize JS -->
    <script type="text/javascript" src="../Controller/Init.js"></script>
    <!-- Collap Button -->
    <script type="text/javascript" src="../Controller/Collap.js"></script>
  </body>
</html>
