<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="?classe=ProdutoController" method="post">
            <input type="hidden" name="acao" value="excluir_lote">
            <table border="1">
                <tr>
                    <td>Selecionar</td><td>Descrição</td><td>Preço</td><td>Excluir</td><td>Alterar</td>
                </tr>

                <?php
                foreach ($produtos as $produto) {

                    echo "<tr>";

                    echo "<td><input type='checkbox' name='id_produtos[]' value={$produto['id']}></td>";

                    echo "<td>{$produto['descricao']}</td>";
                    echo "<td>{$produto['preco']}</td>";

                    echo "<td><a href=?classe=ProdutoController&acao=excluir&id={$produto['id']}>Excluir</a></td>";
                    echo "<td><a href=?classe=ProdutoController&acao=form_alterar&id={$produto['id']}>Alterar</a></td>";

                    echo "</tr>";
                }
                ?>


            </table>

            <?php
            $anterior = $pagina - 1;
            $proxima = $pagina + 1;
            ///////////////////////////////////////////
            //anterior
            if ($pagina > 1) {
                echo "<a href='?classe=ProdutoController&acao=form_inserir&pagina=$anterior'>Anterior</a>";
            }

            ///////////////////////////////////////////
            if ($quantidadeDePaginas > 1) {
                for ($i = 1; $i <= $quantidadeDePaginas; $i++) {
                    if ($pagina == $i) {
                        echo "<a href='?classe=ProdutoController&acao=form_inserir&pagina=$i'><b>$i</b></a>";
                    } else {
                        echo "<a href='?classe=ProdutoController&acao=form_inserir&pagina=$i'>$i</a>";
                    }
                }
            }
            ///////////////////////////////////////////
            if ($pagina != $quantidadeDePaginas) {
                echo "<a href='?classe=ProdutoController&acao=form_inserir&pagina=$proxima'>Próxima</a>";
            }
            ?>
            <br>
            <input type="submit" value="Excluir">
        </form>
    </body>
</html>
