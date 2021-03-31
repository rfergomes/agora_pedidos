<?php

namespace app\models\service;

use app\models\dao\ItemDao;
use app\models\validacao\ItemValidacao;

class ItemService {
    
    public static function salvar($item, $campo, $tabela) {
        $validacao = ItemValidacao::salvar($item);
        return Service::salvar($item, $campo, $validacao->listaErros(), $tabela);
    }

    public static function listaPorPedido($id_pedido) {
        $dao = new ItemDao();
        return $dao->listaPorPedido($id_pedido);
    }
    
    public static function getItem($id_pedido, $id_produto) {
        $dao = new ItemDao();
        return $dao->getItem($id_pedido, $id_produto);
    }


}
