<?php

#Força HTTPS
/* if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {

  } else {
  $new_url = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  echo "<script>window.location='$new_url';</script>";
  exit;
 */

#Define tipo de Acesso    
define('ACESSO', $_SERVER['HTTP_HOST'] == 'www.pedidos.com.br' ? "local" : "remoto");

#Arquivos diretórios raízes
$PastaLocal = "/";   //#Adicionar '/' no inicio e fim
$PastaRemota = "/"; //#Adicionar '/' no inicio e fim

if (ACESSO == "local") {
    #BANCO DE DADOS LOCAL
    define("SERVIDOR", "localhost");
    define("BANCO", "agora_pedido");
    define("USUARIO", "root");
    define("SENHA", "");
    define("CHARSET", "UTF8");

    #Define URL do site LOCAL
    define('URL_BASE', "http://{$_SERVER['HTTP_HOST']}{$PastaLocal}");

    #Define URL padrão de Imagens
    define('URL_IMAGEM', "http://{$_SERVER['HTTP_HOST']}{$PastaLocal}fotos/");

    #Adiciona diretório na raiz, caso definido
    if (substr($_SERVER['DOCUMENT_ROOT'], -1) == '/') {
        define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$PastaLocal}");
    } else {
        define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$PastaLocal}");
    }
	
} else {
	
    #BANCO DE DADOS REMOTO
    define("SERVIDOR", "http://{$_SERVER['HTTP_HOST']}");
    define("BANCO", "agora_agenda");
    define("USUARIO", "root");
    define("SENHA", "");
    define("CHARSET", "UTF8");

    #Define URL do site REMOTO
    define('URL_BASE', "http://{$_SERVER['HTTP_HOST']}{$PastaRemota}");

    #Define URL paddrão de imagens
    define('URL_IMAGEM', "http://{$_SERVER['HTTP_HOST']}{$PastaRemota}fotos/");

    #Adiciona diretório na raiz, caso definido
    if (substr($_SERVER['DOCUMENT_ROOT'], -1) == '/') {
        define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$PastaRemota}");
    } else {
        define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$PastaRemota}");
    }
}

define('CONTROLLER_PADRAO', 'home');
define('METODO_PADRAO', 'index');
define('NAMESPACE_CONTROLLER', 'app\\controllers\\');
define('TIMEZONE', "America/Sao_paulo");
define('CAMINHO', realpath('./'));
define("TITULO_SITE", "Sistema de Pedidos");

define("SESSION_LOGIN", "usuario_logado");

$config_upload["verifica_extensao"] = false;
$config_upload["extensoes"] = array(".gif", ".jpeg", ".png", ".bmp", ".jpg");
$config_upload["verifica_tamanho"] = true;
$config_upload["tamanho"] = 3097152;
$config_upload["caminho_absoluto"] = realpath('./') . '/fotos/';
$config_upload["renomeia"] = true;
/*}*/
    