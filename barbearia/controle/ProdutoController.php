<?php

require_once 'dao/ProdutoDao.php';
require_once 'modelo/Produto.php';
require_once 'util/config.php';

class ProdutoController {

    private $produtoDao;

    public function __construct() {
        $this->produtoDao = new ProdutoDao();
    }

    public function form_inserir() {
        $rotuloBotao = "Inserir";
        $produto = NULL;
        $acao = "inserir";
        include_once 'visao/produto/form.php';
        $this->listar();
    }

    public function excluir() {
        $id = $_GET['id'];
        $this->produtoDao->excluir($id);
        $this->form_inserir();
    }

    public function excluir_lote() {
        $id_produtos = $_POST['id_produtos'];
        $this->produtoDao->excluir_lote($id_produtos);
        $this->form_inserir();
    }

    public function inserir() {
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $produto = new Produto($descricao, $preco);

        $this->produtoDao->inserir($produto);
        $this->form_inserir();
    }

    public function getPagina() {

        if (isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
        } else {
            $pagina = 1;
        }

        return $pagina;
    }

    public function getQuantidadeRegistros() {
        return $this->produtoDao->getQuantidadeRegistros();
    }

    public function getOffset() {
        return $this->getPagina() * LIMITE - LIMITE;      
    }

    public function listar() {
        $pagina = $this->getPagina();
        $quantidadeDePaginas = ceil($this->getQuantidadeRegistros() / LIMITE);
        $produtos = $this->produtoDao->listar($this->getOffset());
        include_once 'visao/produto/listar.php';
    }

    public function form_alterar() {
        $rotuloBotao = "Alterar";
        $produto = $this->produtoDao->buscarPorId($_GET['id']);
        $acao = "alterar";
        include_once 'visao/produto/form.php';
        //$this->listar(); 
    }

    public function alterar() {
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $produto = new Produto($descricao, $preco);

        $produto->setId($_POST['id']);

        $this->produtoDao->alterar($produto);
        $this->form_inserir();
    }

}
