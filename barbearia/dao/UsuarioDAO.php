<?php

include_once 'dao/Conexao.php';

class UsuarioDAO {

    private $conexao;

    function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function buscarUsuario($username, $password) {
        $passwordMd5 = md5($password);
        $query = "select * from usuario where username = '{$username}' and password='{$passwordMd5}'";
        $resultado = mysqli_query($this->conexao, $query);
        $retorno = mysqli_fetch_array($resultado);
        return $retorno;
    }

    public function alterar(Usuario $usuario) {
        $query = "update usuario set nome = '{$usuario->getUsername()}, password= md5('{$usuario->getPassword()}') where id = {$usuario->getId()}'";
        mysqli_query($this->conexao, $query);
    }

    public function buscarPorId($id) {
        $query = "select * from usuario where id = $id";
        $retorno = mysqli_query($this->conexao, $query);
        return mysqli_fetch_array($retorno);
    }

    public function excluir($id) {
        $query = "delete from usuario where id = $id";
        mysqli_query($this->conexao, $query);
    }

    public function excluir_lote($id_usuarios) {
        foreach ($id_usuarios as $id) {
            $query = "delete from usuario where id = $id";
            mysqli_query($this->conexao, $query);
        }
    }

    public function inserir(Usuario $usuario) {
        $query = "insert into usuario (username,password) values "
                . "('{$usuario->getUsername()}', md5('{$usuario->getPassword()}'))";
        mysqli_query($this->conexao, $query);
    }

    public function listar() {
        $usuarios = array();
        $query = "select * from usuario";
        $retorno = mysqli_query($this->conexao, $query);
        while ($linha = mysqli_fetch_array($retorno)) {
            array_push($usuarios, $linha);
        }
        return $usuarios;
    }

}
