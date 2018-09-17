<?php 

require_once 'dao/Conexao.php';

class CursoDAO {

    private $conexao;

    function __construct() {
        $this->conexao = Conexao::getConexao();
    }
    
    public function alterar(Curso $curso) {
        $query = "update curso set nome = '{$curso->getNome()}'";
        mysqli_query($this->conexao, $query);
    }
    
    
    public function buscarPorId($id) {
        $query = "select * from curso where id = $id";
        $retorno = mysqli_query($this->conexao, $query);
        return mysqli_fetch_array($retorno);        
    }

    public function excluir($id) {
        $query = "delete from curso where id = $id";
        mysqli_query($this->conexao, $query);
    }
    
    public function excluir_lote($id_cursos) {
        foreach ($id_cursos as $id) {
            $query = "delete from curso where id = $id";
            mysqli_query($this->conexao, $query);
        }            
    }

    public function inserir(Curso $curso) {
        $query = "insert into curso (nome) values "
                . "('{$curso->getNome()}')";
        mysqli_query($this->conexao, $query);
    }

    public function listar() {
        $cursos = array();
        $query = "select * from curso order by nome";
        $retorno = mysqli_query($this->conexao, $query);
        while ($linha = mysqli_fetch_array($retorno)) {
            array_push($cursos, $linha);
        }
        return $cursos;        
    }

}
