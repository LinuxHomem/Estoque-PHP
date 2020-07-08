<?php
  $instance = new \CrudLog;
  $arr = $instance->read();

  echo "<table class='striped centered'><thead><tr><th>ID</th><th>Data</th><th>Valor em Estoque</th><th>Qtd de Produtos</th><th>Operação</th></tr></thead><tbody>";
  foreach ($arr as $value) {
    $valor_max = round($value['valor_max'],2);
    $valor_max = explode(".",$valor_max);
    if(strlen($valor_max[0]) > 3){
      $valor_max[0] = str_split(strrev($valor_max[0]), 3);
      $valor_max[0] = strrev(implode(".",$valor_max[0]));
    }
    $valor_max = implode(",",$valor_max);

    $data = explode("-",$value['data']);
    $data = implode("/",array_reverse($data));

    $id = $value['id'];
    $qtd_produto = $value['qtd_produto'];
    $op = $value['operacao'];
    echo "<tr><td>$id</td><td>$data</td><td>R$:$valor_max</td><td>$qtd_produto</td><td>$op</td></tr>";
  }

  echo "</tbody></table>";
