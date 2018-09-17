<?php

class Conexao {
    private static $host = "localhost";
    private static $user = "root";
    private static $database = "teste";
    private static $password = "ifsc";
    private static $port = "3306";
    
    public static function getConexao() {
        return mysqli_connect(Conexao::$host, Conexao::$user, Conexao::$password, Conexao::$database, Conexao::$port);
    }
}
