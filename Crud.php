<?php

require_once 'Conexao.php';

class Crud extends Conexao {
    private $tabela;
    private $dados;
    private $conexao;
    private $sql;

    public function select($tabela,array $dados){
        $this->conexao=$this->conectar();

        if (empty($dados)){
            $this->sql= "SELECT * FROM $tabela";
        }else{
            $where="";
            foreach ($dados as $coluna=>$valor){
            $where .= "$coluna='$valor' and ";
            }
            $where = rtrim($where,'and ');
            $this->sql="SELECT * FROM $tabela WHERE $where";
        }

        return $this->conexao->query($this->sql);

    }

    public function selectLeft($tabela1,$tabela2, $campo1, $campo2, array $dados){
        $this->conexao=$this->conectar();

        if (empty($dados)){
            $this->sql= "SELECT * FROM $tabela1 a LEFT JOIN $tabela2 b ON a.$campo1=b.$campo2";
        }else{
            $where="";
            foreach ($dados as $coluna=>$valor){
                $where .= "$coluna='$valor' and ";
            }
            $where = rtrim($where,'and ');
            $this->sql="SELECT * FROM $tabela1 a LEFT JOIN $tabela2 b ON a.$campo1=b.$campo2 WHERE $where";
        }

        return $this->conexao->query($this->sql);

    }

    public function insert($tabela,array $dados){
        $this->conexao=$this->conectar();

        foreach ($dados as $coluna=>$valor){

            $valores .= "$valor".",";
        }

        $valores = rtrim($valores,',');
        $this->sql="INSERT INTO $tabela (ra,chamada) VALUES ($valores)";


        return $this->conexao->query($this->sql);

    }

}
