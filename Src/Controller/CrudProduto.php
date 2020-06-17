<?php
  // limpeza de xss
  function clear($arr){
    $arr2 = array();
    foreach ($arr as $key => $value) {
      $value = htmlspecialchars($value);
      $arr2[] = $value;
    }
    return $arr2;
  }
  // limpeza de xss

  // create section
  function create($arr){
    array_pop($arr);
    $cArr = clear($arr);
    $instance = new \CrudProduto();
    return $instance->create($cArr);
  }
  // create section

  // read section
  function read($arr){
    array_pop($arr);
    $cArr = clear($arr);

    if($cArr[1] == "Nome"){
      $tipo = $cArr[1];
      $term = $cArr[0];
      $cArr[1] = "WHERE nome LIKE ?";
      $cArr[0] = "%" . $cArr[0] . "%";
    }else if($cArr[1] == "ID"){
      $tipo = $cArr[1];
      $term = $cArr[0];
      $cArr[1] = 'WHERE id = ?';
    }else if($cArr[1] == ""){
      $tipo = "";
    }else{
      return 'Tipo Inválido';
    }

    $instance = new \CrudProduto();
    $arr = $instance->read($cArr);

    $server = $_SERVER['PHP_SELF'];
    if($tipo != ""){
      echo $arr[0] . " Produto(s) Encontrado(s) Para: " . $term . " / No Tipo: " . $tipo;
    }else{
      echo "Exibindo Tudo.";
    }
    echo "<form action='$server' method='post'><table class='striped centered'><thead><tr><th>ID</th><th>Nome</th><th>Valor</th><th>Quantidade</th></tr></thead><tbody>";
    for($i=0;$i < $arr[0];$i++){
      $values = $arr[1][$i];
      $id = $values['id'];
      $nome = $values['nome'];
      $valor = $values['valor'];
      $qtd = $values['quantidade'];
      echo "<tr><td>$id</td><td id='$id nome' value='$nome'>$nome</td><td id='$id valor' value='$valor'>$valor</td><td id='$id qtd' value='$qtd'>$qtd</td>";

      echo "<td><button type='button' onclick='edit(this.value);' value='$id' name='btn_edit1'><a
      class='btn-floating btn-small waves-effect waves-light orange'>
      <i class='material-icons'>edit</i></a></button>";

      echo "<button type='submit' value='$id' name='btn_delete'><a
      class='btn-floating btn-small waves-effect waves-light red'>
      <i class='material-icons'>delete</i></a></button></td></tr>";
    }
    echo "</tbody></table></form>";
  }
  // read section

  // update section
  function update($arr){
    array_pop($arr);
    $cArr = clear($arr);
    $cArr[] = $cArr[0];
    array_shift($cArr);
    $instance = new \CrudProduto();
    return $instance->update($cArr);
  }
  // update section

  // delete section
  function delet($id){
    $id = htmlspecialchars($id);
    $instance = new \CrudProduto();
    return $instance->delete($id);
  }
  // delete section
