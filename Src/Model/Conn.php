<?php
class Conexao{

  private static $instance;

  public static function getConn(){
    if(!isset(self::$instance)){
      self::$instance = new \PDO('mysql:host=localhost:3307;dbnme=infoteca;charset=utf8','root','usbw');
    }
    return self::$instance;
  }
}
