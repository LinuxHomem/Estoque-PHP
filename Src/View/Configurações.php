<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Configurações</title>
    <link rel="shortcut icon" href="../../Icons/configuracoes-favicon.png">

    <!-- Materialize Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Chartist Css -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <!-- Master Personal Css -->
    <link rel="stylesheet" href="Master.css">

    <?php
    // Importar Módulo de Conexão, Crud de Logs e Crud de produtos
      require '../Model/Conn.php';
      require '../Model/CrudLog.php';
      require '../Model/CrudProduto.php';
    ?>
  </head>
  <body>
    <nav>
      <div class="nav-wrapper">
        <a data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
          <li><a class="inav" href="index.php"><i class="material-icons left">arrow_back_ios</i>Início</a></li>
          <li><a class="inav" href="Estoque.php"><i class="material-icons left">storefront</i>Estoque</a></li>
          <li><a class="inav" href="Estatísticas.php"><i class="material-icons left">timeline</i>Estatísticas</a></li>
        </ul>
      </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
      <li class="margin"><p class="title5">Configurações</p></li>
      <li class="item"><a class="inav" href="index.php"><i class="material-icons left">arrow_back_ios</i>Início</a></li>
      <li class="item"><a class="inav" href="Estoque.php"><i class="material-icons left">storefront</i>Estoque</a></li>
      <li class="item"><a class="inav" href="Estatísticas.php"><i class="material-icons left">timeline</i>Estatísticas</a></li>
    </ul>

    <p class="title4">Configurações</p>
    <div class="container">
      <ul class="collapsible">
        <li>
          <div class="collapsible-header">
            <i class="material-icons">visibility</i>
            Ver Logs
            <span class="badge"></span>
          </div>
          <div class="collapsible-body collap">
            <?php require '../Controller/RenderLog.php'; ?>
          </div>
        </li>

        <li>
          <div class="collapsible-header">
            <i class="material-icons">delete</i>
            Apagar Logs
            <span class="badge"></span>
          </div>
          <div class="collapsible-body collap">
            <p style="font-size:20px">Apagar os logs que registram mudanças no sistema.</p>

            <button class="btn-large bt waves-effect waves-light red modal-trigger" href="#modal1">
              Apagar
            </button>

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
              <div id="modal1" class="modal">
                <div class="modal-content">
                  <h4>Tem Certeza?</h4>
                  <p>Você tem certeza que deseja excluir os logs que registram as mudanças do sistema? Apagar isso irá excluir os dados usados para as estatísticas.</p>
                </div>

                <div class="modal-footer">
                  <button type="button" class="modal-close waves-effect waves-green btn-flat">Cancelar</button>
                  <button type="submit" name="btn_delete" class="waves-effect waves-green btn-flat">Apagar</button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <li>
          <div class="collapsible-header">
            <i class="material-icons">restore</i>
            Resetar Ordem de ID's
            <span class="badge"></span>
          </div>

          <div id="edit_collap" class="collapsible-body collap">
            <p style="font-size:20px">Resetar a ordem dos ID's dos produtos.</p>

            <button class="btn-large bt waves-effect waves-light red modal-trigger" href="#modal2">
              Resetar
            </button>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
              <div id="modal2" class="modal">
                <div class="modal-content">
                  <h4>Tem Certeza?</h4>
                  <p>Você tem certeza que deseja resetar a ordem dos ID's dos produtos? Eles não irão coincidir com os logs e poderão ter nova ordem.</p>
                </div>

                <div class="modal-footer">
                  <button type="button" class="modal-close waves-effect waves-green btn-flat">Cancelar</button>
                  <button type="submit" name="btn_reset" class="waves-effect waves-green btn-flat">Resetar</button>
                </div>
              </div>
            </form>
          </div>
        </li>
      </ul>
    </div>

    <?php
      if(isset($_POST['btn_delete'])){
        $instance = new \CrudLog;
        $instance->delete();
      }else if(isset($_POST['btn_reset'])){
        $instance = new \CrudProduto;
        $instance->resetId();
      }
     ?>

    <!-- Jquery JS -->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.js"></script><style type="text/css"></style>
    <!-- Materialize JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <!-- Init Materialize JS -->
    <script type="text/javascript" src="../Controller/Init.js"></script>
  </body>
</html>
