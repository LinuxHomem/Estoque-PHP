<?php
class Conexao{

  private static $instance;

  public static function getConn(){
    if(!isset(self::$instance)){
      self::$instance = new \PDO('mysql:host=localhost:3306;dbnme=infoteca;charset=utf8','root','');
    }
    return self::$instance;
  }
}
