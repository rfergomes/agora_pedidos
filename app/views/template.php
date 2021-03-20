<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Sistema de pedidos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale= 1">
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/auxiliar.css">
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/grade.css">
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/style.css">	
    </head>
    <body>
        <div class="conteudo">
            <div class="base-caixa">
                <?php include "cabecalho.php" ?>
                <?php $this->load($view, $viewData); ?> 
            </div>
            <?php include "rodape.php" ?>
        </div>
        <script src="https://kit.fontawesome.com/9480317a2f.js"></script>
        <script src="<?= URL_BASE ?>assets/js/jquery.min.js"></script>
        <script src="<?= URL_BASE ?>assets/js/js.js"></script>
    </body>
</html>