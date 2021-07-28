<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Sistema de pedidos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale= 1">
        <link href="<?= URL_BASE ?>assets/js/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= URL_BASE ?>assets/js/datatables/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= URL_BASE ?>assets/js/datatables/css/style_dataTable.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/auxiliar.css">
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/grade.css">
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/style.css">
        <script src="<?= URL_BASE ?>assets/js/jquery.min.js"></script>
        <script>var base_url = "<?= URL_BASE ?>"</script>
    </head>
    <body>
        <div class="conteudo">
            <div class="base-caixa">
                <?php include "cabecalho.php" ?>
                <section class="conteudo">
                    <?php $this->load($view, $viewData); ?>
                </section>
                <?php include "rodape.php" ?>
            </div>

        </div>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://kit.fontawesome.com/9480317a2f.js"></script>
        <script src="<?= URL_BASE ?>assets/js/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?= URL_BASE ?>assets/js/datatables/js/dataTables.responsive.min.js" type="text/javascript"></script>
        <script src="<?= URL_BASE ?>assets/js/componentes/js_data_table.js" type="text/javascript"></script>
        <script src="<?= URL_BASE ?>assets/js/js.js"></script>
    </body>
</html>