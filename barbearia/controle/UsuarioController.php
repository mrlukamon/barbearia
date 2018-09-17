<?php

include_once 'dao/UsuarioDAO.php';
include_once 'modelo/Usuario.php';

class UsuarioController {

    private $usuarioDao;

    public function __construct() {
        $this->usuarioDao = new UsuarioDAO();
    }

    public function form_login() {
        $acao = 'login';
        include 'visao/usuario/form.php';
    }

    public function form_alterar() {
        $rotuloBotao = "Alterar";
        $usuario = $this->usuarioDao->buscarPorId($_GET['id']);
        $acao = "alterar";
        include_once 'visao/usuario/form.php';
    }

    public function alterar() {
        $username = $_POST['username'];
        $senha = $_POST['password'];
        $usuario = new Usuario($username, $senha);

        $usuario->setId($_POST['id']);

        $this->usuarioDao->alterar($usuario);
        $this->form_inserir();
    }

    public function form_inserir() {
        $rotuloBotao = "Inserir";
        $usuario = NULL;
        $acao = "inserir";
        include_once 'visao/usuario/form.php';
        $this->listar();
    }

    public function inserir() {
        $username = $_POST['username'];
        $senha = $_POST['password'];
        $usuario = new Usuario($username, $senha);

        $this->usuarioDao->inserir($usuario);
        $this->form_inserir();
    }

    public function excluir() {
        $id = $_GET['id'];
        $this->usuarioDao->excluir($id);
        $this->form_inserir();
    }

    public function excluir_lote() {
        $id_usuarios = $_POST['id_usuarios'];
        $this->usuarioDao->excluir_lote($id_usuarios);
        $this->form_inserir();
    }

    public function listar() {
        $usuarios = $this->usuarioDao->listar();
        include_once 'visao/usuario/listar.php';
    }

    public function login() {
        $usuario = $this->usuarioDao->buscarUsuario($_POST['username'], $_POST['password']);

        if ($usuario == null) {
            $_SESSION["fracasso"] = "Usuário nao existe";
            header("Location:  index.php");
            die();
        } else {
            $this->logar($usuario['id']);
        }
    }

    public function logar($usuario_id) {

        $_SESSION["usuario_logado"] = $usuario_id;
        $this->iniciaTempoSessao();
        $_SESSION["sucesso"] = "Usuário Llogado com sucesso";
        header("Location:  index.php");
        die();
    }

    public function iniciaTempoSessao() {
        $_SESSION["tempo"] = time() + TEMPO_DE_SESSAO;
    }

    public function sessaoEstaExpirada() {
        if (isset($_SESSION["tempo"])) {
            if ($_SESSION["tempo"] < time()) {
                $this->deslogar();
                return true;
            } else {
                $this->iniciaTempoSessao();
                return false;
            }
        } else {
            $this->deslogar();
            return true;
        }
    }

    public function verificaUsuario() {
        if ((!$this->usuarioEstaLogado()) or ( $this->sessaoEstaExpirada())) {
            $_SESSION["fracasso"] = "Você não tem acesso a esta funcionalidade ou sua sessão expirou.";
            header("Location:  index.php");
            die();
        } else {
            $_SESSION["sucesso"] = "Usuário logado ainda";
        }
    }

    public function usuarioEstaLogado() {
        return isset($_SESSION["usuario_logado"]);
    }

    public function deslogar() {
        session_destroy();

        session_start();
        $_SESSION["sucesso"] = "Usuário deslogado com sucesso";
        header("Location:  index.php");
        die();
    }

    public function usuarioLogado() {
        return $_SESSION["usuario_logado"];
    }

}

?>