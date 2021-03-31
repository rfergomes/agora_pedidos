<?php

namespace app\models\dao;
use app\core\Model;

class ItemDao extends Model{ 
    public function listaPorPedido($id_pedido) {
        $sql = "SELECT * FROM item i, produto p WHERE i.id_produto = p.id_produto "
                . " AND i.id_pedido = $id_pedido";
        return $this->select($this->db, $sql);
                
    }
    
    public function getItem($id_pedido, $id_produto) {
        $sql = "SELECT * FROM item i, produto p WHERE i.id_produto = p.id_produto "
                . " AND i.id_pedido = $id_pedido AND i.id_produto = $id_produto";
        return $this->select($this->db, $sql);
    }
}
