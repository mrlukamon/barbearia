<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="?classe=UsuarioController" method="post">
            <input type="hidden" name="acao" value="excluir_lote">
            <table border="1">
                <tr>
                    <td>Selecionar</td><td>Nome</td><td>Excluir</td><td>Alterar</td>
                </tr>
                <?php
                foreach ($usuarios as $usuario) {

                    echo "<tr>";

                    echo "<td><input type='checkbox' name='id_usuarios[]' value={$usuario['id']}></td>";

                    echo "<td>{$usuario['username']}</td>";

                    echo "<td><a href=?classe=UsuarioController&acao=excluir&id={$usuario['id']}>Excluir</a></td>";
                    echo "<td><a href=?classe=UsuarioController&acao=form_alterar&id={$usuario['id']}>Alterar</a></td>";

                    echo "</tr>";
                }
                ?>
            </table>
            <input type="submit" value="Excluir">
        </form>
    </body>
</html>
