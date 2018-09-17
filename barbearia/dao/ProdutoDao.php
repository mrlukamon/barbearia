<?php

require_once 'dao/Conexao.php';
require_once 'util/config.php';

class ProdutoDao {

    private $conexao;

    function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    
    
    
    public function alterar(Produto $produto) {
        $query = "update produto set descricao = '{$produto->getDescricao()}', "
                . "preco={$produto->getPreco()} where id = {$produto->getId()}";
        mysqli_query($this->conexao, $query);
    }
    
    
    public function buscarPorId($id) {
        $query = "select * from produto where id = $id";
        $retorno = mysqli_query($this->conexao, $query);
        return mysqli_fetch_array($retorno);        
    }

    public function excluir($id) {
        $query = "delete from produto where id = $id";
        mysqli_query($this->conexao, $query);
    }
    
    public function excluir_lote($id_produtos) {
        foreach ($id_produtos as $id) {
            $query = "delete from produto where id = $id";
            mysqli_query($this->conexao, $query);
        }            
    }

    public function inserir(Produto $produto) {
        $query = "insert into produto (descricao, preco) values "
                . "('{$produto->getDescricao()}',{$produto->getPreco()})";
        mysqli_query($this->conexao, $query);
    }

    public function listar($offset) {
        $produtos = array();
        $query = "select * from produto order by descricao limit " . LIMITE . " offset $offset";
        $retorno = mysqli_query($this->conexao, $query);
        while ($linha = mysqli_fetch_array($retorno)) {
            array_push($produtos, $linha);
        }
        return $produtos;        
    }

    public function getQuantidadeRegistros() {
        $query = "select count(*) from produto";
        $retorno = mysqli_query($this->conexao, $query);
        $quantidade = mysqli_fetch_array($retorno);
        return $quantidade[0];
    }

}
