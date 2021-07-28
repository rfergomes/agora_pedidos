<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\ItemService;
use app\util\UtilService;
use app\models\service\PedidoService;


class ItemController extends Controller{
   private $tabela = "item";
   private $campo  = "id_item";
   
   public function __construct() {
        $this->usuario = UtilService::getUsuario();
        if (!$this->usuario) {
            $this->redirect(URL_BASE . "login");
            exit;
        }
    }
     
    public function salvar(){
        $item = new \stdClass();
        $item->id_item      = $_POST["id_item"];
        $item->id_pedido    = $_POST['id_pedido'];
        $item->id_produto   = $_POST['id_produto'];
        $item->qtde         = $_POST['qtde'];
        $item->valor        = $_POST['valor'];
        $item->subtotal     = $item->qtde * $item->valor;
   
        Flash::setForm($item);
        if(ItemService::salvar($item, $this->campo, $this->tabela)){
            $erro = -1;
            $msg = Flash::getMsg();
        }else{
            $erro = 1;
            $msg = Flash::getErro();
        }
        PedidoService::totalPedido($item->id_pedido);
        $lista = ItemService::listaPorPedido($item->id_pedido);
        echo json_encode(["erro"=> $erro, "msg" => $msg, "lista" => $lista]);
    }
    
    public function excluir($id_item, $id_pedido){
        Service::excluir($this->tabela, $this->campo, $id_item);
        PedidoService::totalPedido($id_pedido);
        $lista = ItemService::listaPorPedido($id_pedido);
        echo json_encode($lista);
    }
    
    public function buscar($dados) {
        $items = Service::getLike("item", "item", $dados, true);
        echo json_encode($items);
    }
}

