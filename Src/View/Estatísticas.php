<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Estatísticas</title>
    <link rel="shortcut icon" href="../../Icons/estatisticas-favicon.png">

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
          <li><a class="inav" href="Estoque.php"><i class="material-icons left">arrow_back_ios</i>Voltar</a></li>
          <li><a class="inav" href="Estoque.php"><i class="material-icons left">storefront</i>Estoque</a></li>
          <li><a class="inav" href="Configurações.php"><i class="material-icons left">settings</i>Configurações</a></li>
        </ul>
      </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
      <li class="margin"><p class="title2">Estatísticas</p></li>
      <li class="item"><a class="inav" href="index.php"><i class="material-icons left">arrow_back_ios</i>Início</a></li>
      <li class="item"><a class="inav" href="Estoque.php"><i class="material-icons left">storefront</i>Estoque</a></li>
      <li class="item"><a class="inav" href="Configurações.php"><i class="material-icons left">settings</i>Configurações</a></li>
    </ul>

    <div class="container s6" style="height:55vh;width:80vw">
      <p class="title3">Estatísticas</p>

      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row">
          <div class="col m11 s8">
            <select required name="tipo">
              <option value="">Estatística...</option>
              <option value="1">Valor Total em Estoque</option>
              <option value="2">Total de Produtos em Estoque</option>
              <option value="3">Entradas</option>
              <option value="4">Saídas</option>
            </select>
          </div>

          <div class="col m1 s4">
            <button style="margin-top:10px" class="btn waves-effect waves-light red lighten-2" type="submit" name="btn_exibir">
              Exibir
            </button>
          </div>
        </div>
      </form>

      <p id="lb"></p>
      <div class="ct-chart ct-perfect-fourth" style="height:100%;width:100%"></div>

      <!-- Chartist JS-->
      <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
      <?php
        if(isset($_POST["btn_exibir"])){
          if($_POST["tipo"] == "1"){
            graph1();
          }else if($_POST["tipo"] == "2"){
            graph2();
          }else if($_POST["tipo"] == "3"){
            graph3();
          }else if($_POST["tipo"] == "4"){
            graph4();
          }
        }else{
          graph1();
        }
      ?>
    </div>

    <!-- Jquery JS -->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.js"></script><style type="text/css"></style>
    <!-- Materialize JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <!-- Init Materialize JS -->
    <script type="text/javascript" src="../Controller/Init.js"></script>
  </body>
</html>
