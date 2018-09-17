<?php

require_once 'dao/Conexao.php';

class EstadoCivilDao {
    private $conexao;

    function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function alterar(EstadoCivil $estadocivil) {
        $query = "update estado_civil set nome = '{$estadocivil->getNome()}' where id = {$estadocivil->getId()}";               
        mysqli_query($this->conexao, $query);
    }
    
    public function buscarPorId($id) {
        $query = "select * from estado_civil where id = $id";
        $retorno = mysqli_query($this->conexao, $query);
        return mysqli_fetch_array($retorno);        
    }
    
    public function excluir($id) {
        $query = "delete from estado_civil where id = $id";
        mysqli_query($this->conexao, $query);
    }
    
    public function excluir_lote($id_estadoscivis) {
        foreach ($id_estadoscivis as $id) {
            $query = "delete from estado_civil where id = $id";
            mysqli_query($this->conexao, $query);
        }            
    }
    
    public function inserir(EstadoCivil $estadocivil) {
        $query = "insert into estado_civil (nome) values "
                . "('{$estadocivil->getNome()}')";
        mysqli_query($this->conexao, $query);
    }
    
    public function listar() {
        $estadoscivis = array();
        $query = "select * from estado_civil order by nome";
        $retorno = mysqli_query($this->conexao, $query);
        while ($linha = mysqli_fetch_array($retorno)) {
            array_push($estadoscivis, $linha);
        }
        return $estadoscivis;        
    }

}
