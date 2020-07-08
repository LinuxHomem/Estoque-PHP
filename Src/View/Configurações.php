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
    <!-- Chartist Css -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <!-- Master Personal Css -->
    <link rel="stylesheet" href="Master.css">

    <?php
    // Importar Módulo de Conexão e Crud de Logs
      require '../Model/Conn.php';
      require '../Model/CrudLog.php';
      require '../Controller/Grafico.php';
    ?>
  </head>
  <body>
    <nav>
      <div class="nav-wrapper">
        <a data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
          <li><a style="font-size:20px;" href="Estoque.php"><i class="material-icons left">arrow_back_ios</i>Voltar</a></li>
          <li><a style="font-size:20px;" href="Estatísticas.php"><i class="material-icons left">timeline</i>Estatísticas</a></li>
        </ul>
      </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
      <li class="margin"><p class="title2">Estatísticas</p></li>
      <li class="item"><a style="font-size:20px;" href="index.php"><i class="material-icons left">arrow_back_ios</i>Início</a></li>
      <li class="item"><a style="font-size:20px;" href="Estoque.php"><i class="material-icons left">storefront</i>Estoque</a></li>
      <li><a style="font-size:20px;" href="Estatísticas.php"><i class="material-icons left">timeline</i>Estatísticas</a></li>
    </ul>

    <div class="container">
      <ul class="collapsible">
        <li>
          <div class="collapsible-header">
            <i class="material-icons">search</i>
            Ver Logs
            <span class="badge"></span>
          </div>

          <div class="collapsible-body collap">

          </div>
        </li>

        <li>
          <div class="collapsible-header">
            <i class="material-icons">add</i>
            Apagar Logs
            <span class="badge"></span>
          </div>

          <div class="collapsible-body collap">

          </div>

        </li>
        <li>

          <div class="collapsible-header">
            <i class="material-icons">edit</i>
            Resetar Ordem de ID's
            <span class="badge"></span>
          </div>

          <div id="edit_collap" class="collapsible-body collap">

          </div>
        </li>
      </ul>
    </div>

    <!-- Jquery JS -->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.js"></script><style type="text/css"></style>
    <!-- Materialize JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <!-- Init Materialize JS -->
    <script type="text/javascript" src="../Controller/Init.js"></script>
  </body>
</html>
