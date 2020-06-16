<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Atividade</title>
    <link rel="shortcut icon" href="../../favicon.png">

    <!-- Materialize Css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <!--Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Personal Css -->
    <link rel="stylesheet" href="index.css">

    <!-- Conexão BD -->
    <?php
      require '../Model/Conn.php';
      require '../Model/CrudProduto.php';
      require '../Controller/CrudProduto.php';
    ?>
  </head>
  <body>
    <nav></nav>
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
              <input name="valor" placeholder="Valor" required>

              <select required name="tipo">
                <option value="">Tipo de Pesquisa...</option>
                <option value="Nome">Nome</option>
                <option value="ID">ID</option>
              </select>

              <div class="row">
                <div class="col">
                  <button class="btn waves-effect waves-light red" type="submit" name="btn_search">
                    Pesquisar
                  </button>
                </div>
              </form>

              <div class="col">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                  <button class="btn waves-effect waves-light red" type="submit" name="btn_searchAll">
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

                <div class="col l3 s12">
                  <input name="0" placeholder="Nome" required>
                </div>

                <div class="col l3 s12">
                  <input name="1" placeholder="Valor" required>
                </div>

                <div class="col l3 s12">
                  <input name="2" placeholder="Quantidade" required>
                </div>

                <div class="col l2 s12">
                  <button type="submit" name="btn_add"><a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a></button>
                </div>
              </div>
            </form>
          </div>
        </li>
      </ul>

      <?php
        $table = "<table><thead><tr><th>ID</th><th>Nome</th><th>Valor</th><th>Quantidade</th></tr></thead></table>";
        if(isset($_POST['btn_add'])){
          echo create($_POST);
          echo read(array("","",""));
        }else if(isset($_POST['btn_search'])){
          echo read($_POST);
        }else if(isset($_POST['btn_edit'])){
          echo update($_POST);
          read(array($_POST['btn_edit'],"ID",""));
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

    <!-- Jquery Js -->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.js"></script><style type="text/css"></style>
    <!-- Materialize JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <!-- Init Materialize JS -->
    <script src="../Controller/Init.js"></script>
  </body>
</html>
