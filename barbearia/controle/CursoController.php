<?php

require_once 'dao/CursoDAO.php';
require_once 'modelo/Curso.php';

class CursoController {

    private $cursoDao;
    
    public function __construct() {
        $this->cursoDao = new CursoDAO();
    }

    public function form_inserir() {
        $rotuloBotao = "Inserir";
        $curso = NULL;
        $acao = "inserir";
        include_once 'visao/curso/form.php';
        $this->listar();
    }

    public function excluir() {
        $id = $_GET['id'];
        $this->cursoDao->excluir($id);
        $this->form_inserir();
    }
    
    public function excluir_lote() {
        $id_cursos = $_POST['id_cursos'];
        $this->cursoDao->excluir_lote($id_cursos);
        $this->form_inserir();
    }

    public function inserir() {
        $nome = $_POST['nome'];
        $curso = new Curso($nome);

        $this->cursoDao->inserir($curso);
        $this->form_inserir();
    }

    public function listar() {
        $cursos = $this->cursoDao->listar();
        include_once 'visao/curso/listar.php';
    }

    public function form_alterar() {
        $rotuloBotao = "Alterar";
        $curso = $this->cursoDao->buscarPorId($_GET['id']);
        $acao = "alterar";
        include_once 'visao/curso/form.php';
    }

    public function alterar() {
        $nome = $_POST['nome'];
        $curso = new Curso($nome);

        $curso->setId($_POST['id']);

        $this->cursoDao->alterar($curso);
        $this->form_inserir();
    }

}
