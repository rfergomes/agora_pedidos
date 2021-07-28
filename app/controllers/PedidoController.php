<?php

namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\PedidoService;
use app\util\UtilService;
use app\models\service\ItemService;

class PedidoController extends Controller {

    private $tabela = "pedido";
    private $campo = "id_pedido";

    public function __construct() {
        $this->usuario = UtilService::getUsuario();
        if (!$this->usuario) {
            $this->redirect(URL_BASE . "login");
            exit;
        }
    }

    public function index() {
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"] = "Pedido/home";
        $this->load("template", $dados);
    }
    
    public function filtro() {
        $filtro = new \stdClass();
        $filtro->data1 = $_GET["data1"];
        $filtro->data2 = $_GET["data2"];
        $dados["lista"] = PedidoService::filtro($filtro);
        $dados["view"] = "Pedido/home";
        $this->load("template", $dados);
    }

    public function novo() {
        $id_cliente = $this->usuario->id_cliente;
        $pedido = PedidoService::getPedidoNaoFinalizado($id_cliente);
        if (!$pedido) {
            $id_pedido = Service::inserir([
                        "id_cliente" => $id_cliente,
                        "data" => hoje(),
                        "hora" => agora()
                            ], $this->tabela);
            $pedido = PedidoService::getPedido($id_pedido);
        }
        $dados["itens"] = ItemService::listaPorPedido($pedido->id_pedido);
        $dados["pedido"] = $pedido;
        $dados["view"] = "Pedido/novo";
        $this->load("template", $dados);
    }
    
     public function detalhe($id_pedido) {
        $pedido = PedidoService::getPedido($id_pedido);      
        $dados["itens"] = ItemService::listaPorPedido($pedido->id_pedido);
        $dados["pedido"] = $pedido;
        $dados["view"] = "Pedido/detalhe";
        $this->load("template", $dados);
    }
    
    public function finalizar($id_pedido) {
        Service::editar(["finalizado" => "S", "id_pedido" => $id_pedido], $this->campo, $this->tabela);
        $this->redirect(URL_BASE . "pedido");
    }

    public function cancelar($id_pedido) {
        $id = Service::excluir("item", $this->campo, $id_pedido);
        if ($id) {
            Service::excluir($this->tabela, $this->campo, $id_pedido);
        }
        $this->redirect(URL_BASE . "pedido");
    }

}
