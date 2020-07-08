<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Início</title>
    <link rel="shortcut icon" href="../../Icons/index-favicon.png">

    <!-- Materialize Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Master Personal Css -->
    <link rel="stylesheet" href="Master.css">
  </head>
  <body>
    <nav>
      <div class="nav-wrapper">
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
          <li><a class="inav" href="Estoque.php"><i class="material-icons left">storefront</i>Estoque</a></li>
          <li><a class="inav" href="Estatísticas.php"><i class="material-icons left">timeline</i>Estatísticas</a></li>
          <li><a class="inav" href="Configurações.php"><i class="material-icons left">settings</i>Configurações</a></li>
        </ul>
      </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
      <li class="margin"><p class="title2">LOJA</p></li>
      <li class="item"><a class="inav" href="Estoque.php"><i class="material-icons left">storefront</i>Estoque</a></li>
      <li class="item"><a class="inav" href="Estatísticas.php"><i class="material-icons left">timeline</i>Estatísticas</a></li>
      <li class="item"><a class="inav" href="Configurações.php"><i class="material-icons left">settings</i>Configurações</a></li>
    </ul>

    <div class="container valign-wrapper content">
      <div class="content2">
        <center>
          <p class="title">LOJA</p>
          <ul>
            <li><a href="Estoque.php" class="waves-effect waves-light btn-large red lighten-2 bt2">Estoque</a></li>
          </ul>
        </center>
      <div>
    </div>

    <!-- Jquery Js -->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.js"></script><style type="text/css"></style>
    <!-- Materialize JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <!-- Init Materialize JS -->
    <script type="text/javascript" src="../Controller/Init.js"></script>
  </body>
</html>
