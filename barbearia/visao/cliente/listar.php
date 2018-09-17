<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="?classe=ClienteController" method="post">
            <input type="hidden" name="acao" value="excluir_lote">
            <table border="1">
                <tr>
                    <td>Selecionar</td><td>Nome</td><td>Telefone</td><td>Estado Civil</td><td>Excluir</td><td>Alterar</td>
                </tr>

                <?php
                foreach ($clientes as $cliente) {

                    echo "<tr>";
                    
                    echo "<td><input type='checkbox' name='id_clientes[]' value={$cliente['id']}></td>";
                    
                    echo "<td>{$cliente['cliente_nome']}</td>";
                    echo "<td>{$cliente['fone']}</td>";
                    echo "<td>{$cliente['estado_civil_nome']}</td>";

                    echo "<td><a href=?classe=ClienteController&acao=excluir&id={$cliente['id']}>Excluir</a></td>";
                    echo "<td><a href=?classe=ClienteController&acao=form_alterar&id={$cliente['id']}>Alterar</a></td>";

                    echo "</tr>";
                }
                ?>




            </table>
            <input type="submit" value="Excluir">
        </form>
    </body>
</html>
