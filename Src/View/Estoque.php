<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Estoque</title>
    <link rel="shortcut icon" href="../../Icons/estoque-favicon.png">

    <!-- Materialize Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Master Personal Css -->
    <link rel="stylesheet" href="Master.css">

    <!-- Importar Módulo de Conexão e Crud de Produtos -->
    <?php
      require '../Model/Conn.php';
      require '../Model/CrudProduto.php';
      require '../Controller/CrudProduto.php';
    ?>
  </head>
  <body>
    <nav>
      <div class="nav-wrapper">
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
          <li><a style="font-size:20px;" href="index.php"><i class="material-icons left">arrow_back_ios</i>Voltar</a></li>
        </ul>
      </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
      <li class="margin"><p class="title2">ESTOQUE</p></li>
      <li><hr></li>
      <li class="margin"><a style="font-size:20px;" href="index.php"><i class="material-icons left">arrow_back_ios</i>Voltar</a></li>
    </ul>

    <p class="title">ESTOQUE</p>
    <div class="container">
      <ul class="collapsible">
        <li>
          <div class="collapsible-header">
            <i class="material-icons">search</i>
            Pesquisar
            <span class="badge"></span>
          </div>

          <div class="collapsible-body collap">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

              <div class="input-field col s12">
                <input type="text" id='vl' name="valor" required>
                <label for="vl">Valor</label>
              </div>

              <select required name="tipo">
                <option value="">Tipo de Pesquisa...</option>
                <option value="Nome">Nome</option>
                <option value="ID">ID</option>
              </select>

              <div class="row">
                <div class="col s6 center">
                  <button class="btn bt waves-effect waves-light blue" type="submit" name="btn_search">
                    Pesquisar
                  </button>
                </div>
              </form>

              <div class="col s6 center">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                  <button class="btn bt waves-effect waves-light blue" type="submit" name="btn_searchAll">
                    Exibir Tudo
                  </button>
                </form>
              </div>
            </div>
          </div>
        </li>

        <li>
          <div class="collapsible-header">
            <i class="material-icons">add</i>
            Adicionar Produto
            <span class="badge"></span>
          </div>

          <div class="collapsible-body collap">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="row">

                <div class="input-field col l4 s12">
                  <input type='text' id='0' name="0" required>
                  <label for="0">Nome</label>
                </div>

                <div class="input-field col l3 s12">
                  <input class="mask" type='text' id='1' name="1" required>
                  <label for="1">Valor</label>
                </div>

                <div class="input-field col l3 s12">
                  <input type='number' id='2' name="2" required>
                  <label for="2">Quantidade</label>
                </div>

                <div class="input-field col l2 s12 center">
                  <button type="submit" name="btn_add"><a class="btn-floating btn-large waves-effect waves-light yellow accent-2"><i style="color: #000000;" class="material-icons">add</i></a></button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <li>
          <div class="collapsible-header">
            <i class="material-icons">edit</i>
            Editar Produto
            <span class="badge"></span>
          </div>

          <div id="edit_collap" class="collapsible-body collap">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="row">

                <div class="input-field col l2 s12">
                  <input type="number" id="id" name="0" required>
                  <label id="lbid" for="id">ID</label>
                </div>

                <div class="input-field col l3 s12">
                  <input type="text" id="name" name="1" required>
                  <label id="lbname" for="id">Nome</label>
                </div>

                <div class="input-field col l3 s12">
                  <input class="mask" type="text" id="value" name="2" required>
                  <label id="lbvalue" for="id">Valor</label>
                </div>

                <div class="input-field col l2 s12">
                  <input type="number" id="quantity" name="3" required>
                  <label id="lbquantity" for="id">Quantidade</label>
                </div>

                <div class="input-field col l2 s12 center">
                  <button type="submit" name="btn_edit"><a class="btn-floating btn-large waves-effect waves-light light-green accent-3"><i style="color: #000000;" class="material-icons">done</i></a></button>
                </div>
              </div>
            </form>
          </div>
        </li>
      </ul>

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

      <?php
        $table = "<table><thead><tr><th>ID</th><th>Nome</th><th>Valor</th><th>Quantidade</th></tr></thead></table>";
        if(isset($_POST['btn_add'])){
          print_r(create($_POST));
          echo read(array("","",""));

        }else if(isset($_POST['btn_search'])){
          echo read($_POST);

        }else if(isset($_POST['btn_edit'])){
          $arr = update($_POST);
          if($arr === false){
            echo "Não foi possível editar o produto.";
            echo read(array("","",""));
          }else{
            echo "Produto Editado. <br>";
            read(array($arr[1],"ID",""));
          }

        }else if(isset($_POST['btn_delete'])){
          echo delet($_POST['btn_delete']);
          read(array("","",""));

        }else if(isset($_POST['btn_searchAll'])){
          read(array("","",""));

        }else{
          echo $table;
        }
      ?>
    </div>
  </body>
</html>
