<?php 

require_once 'dao/Conexao.php';

class ClienteDao {

    private $conexao;

    function __construct() {
        $this->conexao = Conexao::getConexao();
    }
    
    public function alterar(Cliente $cliente) {
        $query = "update cliente set nome = '{$cliente->getNome()}', fone='{$cliente->getFone()}', "
                . "estado_civil_id='{$cliente->getEstado_civil_id()}' where id = {$cliente->getId()}";
        mysqli_query($this->conexao, $query);
    }
    
    
    public function buscarPorId($id) {
        $query = "select * from cliente where id = $id";
        $retorno = mysqli_query($this->conexao, $query);
        return mysqli_fetch_array($retorno);        
    }

    public function excluir($id) {
        $query = "delete from cliente where id = $id";
        mysqli_query($this->conexao, $query);
    }
    
    public function excluir_lote($id_clientes) {
        foreach ($id_clientes as $id) {
            $query = "delete from cliente where id = $id";
            mysqli_query($this->conexao, $query);
        }            
    }

    public function inserir(Cliente $cliente) {
        $query = "insert into cliente (nome, fone, estado_civil_id) values "
                . "('{$cliente->getNome()}','{$cliente->getFone()}', '{$cliente->getEstado_civil_id()}')";
        mysqli_query($this->conexao, $query);
    }

    public function listar() {
        $clientes = array();
        $query = "select cliente.id, cliente.nome as cliente_nome, cliente.fone, estado_civil.nome as estado_civil_nome from cliente join estado_civil on estado_civil.id=cliente.estado_civil_id order by cliente_nome";
        $retorno = mysqli_query($this->conexao, $query);
        while ($linha = mysqli_fetch_array($retorno)) {
            array_push($clientes, $linha);
        }
        return $clientes;        
    }

}
