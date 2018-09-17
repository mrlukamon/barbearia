<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="?classe=CursoController" method="post">
            <input type="hidden" name="acao" value="excluir_lote">
            <table border="1">
                <tr>
                    <td>Selecionar</td><td>Nome</td><td>Excluir</td><td>Alterar</td>
                </tr>
                <?php
                foreach ($cursos as $curso) {

                    echo "<tr>";

                    echo "<td><input type='checkbox' name='id_cursos[]' value={$curso['id']}></td>";

                    echo "<td>{$curso['nome']}</td>";

                    echo "<td><a href=?classe=CursoController&acao=excluir&id={$curso['id']}>Excluir</a></td>";
                    echo "<td><a href=?classe=CursoController&acao=form_alterar&id={$curso['id']}>Alterar</a></td>";

                    echo "</tr>";
                }
                ?>
            </table>
            <input type="submit" value="Excluir">
        </form>
    </body>
</html>
