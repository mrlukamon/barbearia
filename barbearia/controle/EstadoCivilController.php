<?php

require_once 'dao/EstadoCivilDao.php';
require_once 'modelo/EstadoCivil.php';

class EstadoCivilController {
    private $estadocivilDao;
    
    public function __construct() {
        $this->estadocivilDao = new EstadoCivilDao();
    }
    
    public function form_inserir() {
        $rotuloBotao = "Inserir";
        $estadocivil = NULL;
        $acao = "inserir";
        include_once 'visao/estadoCivil/form.php';
        $this->listar();
    }
    
    public function excluir() {
        $id = $_GET['id'];
        $this->estadocivilDao->excluir($id);
        $this->form_inserir();
    }
    
    public function excluir_lote() {
        $id_estadoscivis = $_POST['id_estadoscivis'];
        $this->estadocivilDao->excluir_lote($id_estadoscivis);
        $this->form_inserir();
    }
    
    public function inserir() {
        $nome = $_POST['nome'];
        $estadocivil = new EstadoCivil($nome);

        $this->estadocivilDao->inserir($estadocivil);
        $this->form_inserir();
    }
    
    public function listar() {
        $estadoscivis = $this->estadocivilDao->listar();
        include_once 'visao/estadoCivil/listar.php';
    }
    
    public function form_alterar() {
        $rotuloBotao = "Alterar";
        $estadocivil = $this->estadocivilDao->buscarPorId($_GET['id']);
        $acao = "alterar";
        include_once 'visao/estadoCivil/form.php';
        //$this->listar(); 
    }
    
    public function alterar() {
        $nome = $_POST['nome'];
        $estadocivil = new EstadoCivil($nome);

        $estadocivil->setId($_POST['id']);

        $this->estadocivilDao->alterar($estadocivil);
        $this->form_inserir();
    }

}
