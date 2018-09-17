<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>







        <form action="?classe=EstadoCivilController" method="post">

            <input type="hidden" name="acao" value="<?= $acao ?>">

            <input type="hidden" name="id"        value="<?= $estadocivil['id'] ?>">
            Nome: <input type="text"   name="nome" value="<?= $estadocivil['nome'] ?>">
            <input type="submit" value="<?= $rotuloBotao ?>">

        </form>
    </body>
</html>
