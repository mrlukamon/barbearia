<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>







        <form action="?classe=ClienteController" method="post">

            <input type="hidden" name="acao" value="<?= $acao ?>">

            <input type="hidden" name="id"        value="<?= $cliente['id'] ?>">
            Nome: <input type="text"   name="nome" value="<?= $cliente['nome'] ?>">
            Telefone:     <input type="text"   name="fone"     value="<?= $cliente['fone'] ?>">

            Estado civil: <select name="estado_civil_id">
                <?php
                foreach ($estadoscivis as $value) {
                    $selected = '';
                    if ($cliente['estado_civil_id'] == $value['id']) {
                        $selected = 'selected';
                    }
                    ?>
                    <option <?= $selected ?> value="<?= $value['id'] ?>"><?= $value['nome'] ?></option>
                    <?php
                }
                ?>
            </select>

            <input type="submit" value="<?= $rotuloBotao ?>">

        </form>
    </body>
</html>
