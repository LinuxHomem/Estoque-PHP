<?php
  class CrudProduto{
    // log section
    public static function newLog($id,$op){
      $arr = new CrudProduto;
      $arr = $arr->read(array("",""));

      $max = 0;
      $i = 0;
      foreach ($arr[1] as $value) {
        $j = $arr[1][$i]["valor"];
        $j = str_replace(".","",$j);
        $j = str_replace(",",".",$j);
        $max += $j;
        $i++;
      }

      $qtd = $arr[0];
      $date = date("Y-m-d");

      // $sql = "INSERT INTO `loja`.`log` VALUES (NULL,$date,$max,$qtd,$op,$id)";
      // $stmt = Conexao::getConn()->prepare($sql);
      //
      // if($stmt->execute() === false){
      //   echo "Falha ao Gravar Log. <br>";
      // }
      echo $date . "<br>";
      echo $max . "<br>";
      echo $qtd . "<br>";
      echo $op . "<br>";
      echo $id . "<br>";
    }
    // log section

    // create section
    public function create($arr){
      $sql = "INSERT INTO `loja`.`produto` VALUES (NULL,?,?,?)";
      $stmt = Conexao::getConn()->prepare($sql);

      $count = 1;
      foreach ($arr as $value) {
        $stmt->bindValue($count,$value);
        $count++;
      }

      if($stmt->execute() === false){
        return "Falha ao Cadastrar o Produto. <br>";
      }else{
        self::newLog("id","create");
        return "Produto Cadastrado. <br>";
      }
    }
    // create section

    // read section
    public function read($arr){
      $sql = "SELECT * FROM `loja` . `produto` $arr[1]";
      $stmt = Conexao::getConn()->prepare($sql);

      $stmt->bindValue(1,$arr[0]);

      if($stmt->execute() === false){
        return false;
      }else{
        return array($stmt->rowCount(),$stmt->fetchAll(\PDO::FETCH_ASSOC));
      }
    }
    // read section

    public function update($arr){
      $sql = "UPDATE `loja`.`produto` SET nome = ?, valor = ?, quantidade = ? WHERE id = ?";
      $stmt = Conexao::getConn()->prepare($sql);

      $count = 1;
      foreach ($arr as $value) {
        $stmt->bindValue($count,$value);
        $count++;
      }

      if($stmt->execute() === false){
        return false;
      }else{
        return $arr[3];
      }
    }

    public function delete($id){
      $sql = "DELETE FROM `loja` . `produto` WHERE id = ?";
      $stmt = Conexao::getConn()->prepare($sql);

      $stmt->bindValue(1,$id);

      if($stmt->execute() === false){
        return "Falha ao Deletar o Produto. <br>";
      }else{
        $ret = "Item com o id '$id' foi deletado! <br>";
        return $ret;
      }
    }
  }
