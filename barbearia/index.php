<?php

session_start();
require_once 'cabecalho.php';

ini_set("display_errors", true);

require_once 'controle/ProdutoController.php';
require_once 'controle/ClienteController.php';
require_once 'controle/EstadoCivilController.php';
require_once 'controle/UsuarioController.php';
require_once 'controle/DefaultController.php';
require_once './controle/CursoController.php';
require_once '../Projeto7/controle/UsuarioController.php';
require_once 'util/exibirMensagem.php';
require_once 'util/config.php';

if (isset($_GET['classe'])) { // verifico se houve uma requisição, um click
    $classe = $_GET['classe']; // pego a classe escolhida, clicada
    if (isset($_GET['acao'])) { // verifico se houve uma acao escolhida
        $acao = $_GET['acao'];  // pego a acao
    } else if (isset($_POST['acao'])) { // faço a mesma coisa paga post, verificou se houve uma acao post, formulario
        $acao = $_POST['acao']; // pego a acao do formulario
    }
} else {  // se nao houve nenhuma requição, é sinal que a pagina principal, aberta pela primeira vez
    $classe = new DefaultController(); // defino como controlar a página principal
    $acao = "acaoDefault"; // a acao padrao da página principal
}

// depois de pegar a classe e a acao, crio o objeto e invoco os metodos correspondentea a acao
$classeController = new $classe();
$classeController->$acao();

// area destinada a exibição de mensagens
mostraAlerta("sucesso");
mostraAlerta("fracasso");


require_once 'rodape.php';
?>



