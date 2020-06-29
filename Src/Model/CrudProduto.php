<?php
  class CrudProduto{
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
        $id = self::read(array("",""));

        $instance = new \CrudLog;
        $instance->newLog(end($id[1])["id"],"create");

        return "Produto Cadastrado. <br>";
      }
    }
    // create section

    // read section
    public function read($arr){
      $sql = "SELECT * FROM `loja` . `produto` $arr[1] ORDER BY id";
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
        $instance = new \CrudLog;
        $instance->newLog($arr[3],"update");

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
        $instance = new \CrudLog;
        $instance->newLog($id,"delete");

        $ret = "Item com o id '$id' foi deletado! <br>";
        return $ret;
      }
    }
  }
