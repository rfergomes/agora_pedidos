<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Sistema de pedido</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale= 1">
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/auxiliar.css">
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/grade.css">
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/style.css">

        <script src="<?= URL_BASE ?>assets/js/jquery.min.js"></script>
        <script src="<?= URL_BASE ?>assets/js/js.js"></script>
        <script src="https://kit.fontawesome.com/9480317a2f.js"></script>

    </head>
    <body class="login">
        <div class="col-4 m-auto">
            <?=
            $this->verMsg();
            $this->verErro();
            ?>
            <div class="base-login">
                <h2>PEDIDO LOGIN</h2>
                <form action="<?= URL_BASE ?>login/logar" method="post">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Digite seu email">

                    <label>Senha</label>
                    <input type="password" name="senha" placeholder="Digite sua senha">
                    <input type="submit" value="Entrar" name="" class="btn mt-2 width-100">
                </form>
                <a href="" class="senha link-roxo mt-4 d-block"><small>Esqueci minha senha</small></a>
            </div>
            <div class="mostraCampo base-login">
                <div class="bg-login-2 radius-4">
                    <span class="senha fechar"><i class="fas fa-window-close"></i></span>
                    <h2>Esqueci minha senha</h2>
                    <small>Digite seu email abaixo para recuperar sua senha</small>
                    <form action="<?= URL_BASE ?>login/esqueci" method="POST">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Digite seu email" class="mb-2">
                        <input type="submit" value="Enviar email" name="" class="btn btn-azul m-auto width-100">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>