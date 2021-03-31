<?php

namespace app\models\service;

use app\models\validacao\ClienteValidacao;
use app\models\dao\PedidoDao;

class PedidoService {

    public static function getPedidoNaoFinalizado($id_cliente) {
        $dao = new PedidoDao();
        return $dao->getPedidoNaoFinalizado($id_cliente);
    }
    
    public static function getPedido($id_pedido) {
        $dao = new PedidoDao();
        return $dao->getPedido($id_pedido);
    }
    
    public static function totalPedido($id_pedido) {
        $soma = Service::getSoma("item", "subtotal", "id_pedido", $id_pedido);
        Service::editar(["total_pedido" => $soma, "id_pedido" => $id_pedido], "id_pedido", "pedido");
    }

}
