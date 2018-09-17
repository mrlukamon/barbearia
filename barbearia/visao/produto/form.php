<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="?classe=ProdutoController" method="post">
            
                       <input type="hidden" name="acao" value="<?= $acao ?>">
            
                       <input type="hidden" name="id"        value="<?=$produto['id'] ?>">
            Descrição: <input type="text"   name="descricao" value="<?=$produto['descricao']?>">
            Preço:     <input type="text"   name="preco"     value="<?=$produto['preco'] ?>">
            <input type="submit" value="<?= $rotuloBotao ?>">
            
        </form>
    </body>
</html>
