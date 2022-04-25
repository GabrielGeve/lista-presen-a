<?php

class Conexao{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $charset;


  public function __construct($host,$user,$pass,$db,$charset)
  {
      $this->host=$host;
      $this->user=$user;
      $this->pass=$pass;
      $this->db=$db;
      $this->charset=$charset;
  }

  public function conectar(){
      $conn = new mysqli('localhost','root', '', 'instituicao');
      $conn->set_charset('utf8');
      return $conn;
  }
}
