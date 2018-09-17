<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>







        <form action="?classe=CursoController" method="post">

            <input type="hidden" name="acao" value="<?= $acao ?>">

            <input type="hidden" name="id"        value="<?= $curso['id'] ?>">
            Nome: <input type="text"   name="nome" value="<?= $curso['nome'] ?>">
            <input type="submit" value="<?= $rotuloBotao ?>">

        </form>
    </body>
</html>
