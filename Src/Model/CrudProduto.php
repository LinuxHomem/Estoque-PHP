<?php
  class CrudProduto{
    // create section
    public function create($arr){
      // criar sql a ser preparado para verificação de sql injection
      $sql = "INSERT INTO `loja`.`produto` VALUES (NULL,?,?,?)";
      $stmt = Conexao::getConn()->prepare($sql);

      // alterar as lacunas pelos valores recebidos do POST
      $count = 1;
      foreach ($arr as $value) {
        $stmt->bindValue($count,$value);
        $count++;
      }

      // executar cadastro
      if($stmt->execute() === false){
        return "Falha ao Cadastrar o Produto. <br>";
      }else{
        return "Produto Cadastrado. <br>";
      }
    }
    // create section

    // read section
    public function read($arr){
      // criar sql a ser preparado para verificação de sql injection
      $sql = "SELECT * FROM `loja` . `produto` $arr[1]";
      $stmt = Conexao::getConn()->prepare($sql);

      // alterar a lacuna pelo valor
      $stmt->bindValue(1,$arr[0]);

      // executar a busca e retornar número de linhas e os resultados da busca
      $stmt->execute();
      return array($stmt->rowCount(),$stmt->fetchAll(\PDO::FETCH_ASSOC));
    }
    // read section

    public function update(){

    }

    public function delete($id){
      $sql = "DELETE FROM `loja` . `produto` WHERE id = ?";
      $stmt = Conexao::getConn()->prepare($sql);

      $stmt->bindValue(1,$id);
      $stmt->execute();
      $ret = "Item com o id '$id' foi deletado! <br>";
      return $ret;
    }
  }
