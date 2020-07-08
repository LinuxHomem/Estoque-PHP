<?php
  function dados(){
    $instance = new \CrudLog;
    $arr = $instance->read();
    return $arr;
  }

  // renderização
  function render($arr,$lb){
    echo "<script> var data = { labels: [";
    foreach ($arr as $key => $value) {
      echo "'$key',";
    }
    echo "], series:[[";

    foreach ($arr as $key => $value) {
      echo "'$value',";
    }
    echo "]]};new Chartist.Line('.ct-chart',data,{ fullWidth: true, showArea: true });
    document.getElementById('lb').textContent = '$lb';
    </script>";
  }
  // renderização

  // Função dos dois primeiros gráficos
  function cm1($arr,$lb,$op){
    $x = array();
    foreach ($arr as $i) {
      $j = explode("-",$i["data"]);
      $j = end($j) . "/" . $j[1];
      $x[$j] = round($i[$op],2);
    }
    render($x,$lb);
  }
  // Função dos dois primeiros gráficos

  // Função dos dois segundos gráficos
  function cm2($arr,$lb,$op){
    $x = array();
    $y = array();
    foreach ($arr as $value) {
      if($value["operacao"] == $op){
        $x[] = $value["data"];
      }
    }

    $x = array_count_values($x);

    foreach ($x as $key => $value) {
      $key = explode("-",$key);
      $key = end($key) . "/" . $key[1];
      $y[$key] = $value;
    }
    render($y,$lb);
  }
  // Função dos dois segundos gráficos

  function graph1(){
    $arr = dados();
    $lb = "Valor Total em Estoque";
    $op = "valor_max";
    cm1($arr,$lb,$op);
  }

  function graph2(){
    $arr = dados();
    $lb = "Total de Produtos em Estoque";
    $op = "qtd_produto";
    cm1($arr,$lb,$op);
  }

  function graph3(){
    $arr = dados();
    $lb = "Quantidade de Entradas";
    $op = "create";
    cm2($arr,$lb,$op);
  }

  function graph4(){
    $arr = dados();
    $lb = "Quantidade de Saídas";
    $op = "delete";
    cm2($arr,$lb,$op);
  }
