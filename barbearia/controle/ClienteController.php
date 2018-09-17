<?php

require_once 'dao/EstadoCivilDao.php';
require_once 'dao/ClienteDao.php';
require_once 'modelo/Cliente.php';

class ClienteController {

    private $clienteDao;
    private $estadoCilvilDao;
    
    public function __construct() {
        $this->clienteDao = new ClienteDao();
        $this->estadoCilvilDao = new EstadoCivilDao();
    }

    public function form_inserir() {
        $rotuloBotao = "Inserir";
        $cliente = NULL;
        $acao = "inserir";
        $estadoscivis = $this->estadoCilvilDao->listar();
        include_once 'visao/cliente/form.php';
        $this->listar();
    }

    public function excluir() {
        $id = $_GET['id'];
        $this->clienteDao->excluir($id);
        $this->form_inserir();
    }
    
    public function excluir_lote() {
        $id_clientes = $_POST['id_clientes'];
        $this->clienteDao->excluir_lote($id_clientes);
        $this->form_inserir();
    }

    public function inserir() {
        $nome = $_POST['nome'];
        $fone = $_POST['fone'];
        $estado_civil_id = $_POST['estado_civil_id'];
        $cliente = new Cliente($nome, $fone, $estado_civil_id);

        $this->clienteDao->inserir($cliente);
        $this->form_inserir();
    }

    public function listar() {
        $clientes = $this->clienteDao->listar();
        include_once 'visao/cliente/listar.php';
    }

    public function form_alterar() {
        $rotuloBotao = "Alterar";
        $cliente = $this->clienteDao->buscarPorId($_GET['id']);
        $acao = "alterar";
        $estadoscivis = $this->estadoCilvilDao->listar();
        include_once 'visao/cliente/form.php';
        //$this->listar(); 
    }

    public function alterar() {
        $nome = $_POST['nome'];
        $fone = $_POST['fone'];
        $estado_civil_id = $_POST['estado_civil_id'];
        $cliente = new Cliente($nome, $fone, $estado_civil_id);

        $cliente->setId($_POST['id']);

        $this->clienteDao->alterar($cliente);
        $this->form_inserir();
    }

}
