<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="?classe=EstadoCivilController" method="post">
            <input type="hidden" name="acao" value="excluir_lote">
            <table border="1">
                <tr>
                    <td>Selecionar</td><td>Nome</td><td>Excluir</td><td>Alterar</td>
                </tr>

                <?php
                foreach ($estadoscivis as $estadocivil) {

                    echo "<tr>";

                    echo "<td><input type='checkbox' name='id_estadoscivis[]' value={$estadocivil['id']}></td>";
                    echo "<td>{$estadocivil['nome']}</td>";

                    echo "<td><a href=?classe=EstadoCivilController&acao=excluir&id={$estadocivil['id']}>Excluir</a></td>";
                    echo "<td><a href=?classe=EstadoCivilController&acao=form_alterar&id={$estadocivil['id']}>Alterar</a></td>";

                    echo "</tr>";
                }
                ?>




            </table>
            
            <input type="submit" value="Excluir">
        </form>
    </body>
</html>
