<?php

namespace app\models\dao;
use app\core\Model;

class PedidoDao extends Model{
    public function getPedidoNaoFinalizado($id_cliente) {
        $sql = "SELECT * FROM pedido p, cliente c WHERE p.id_cliente = c.id_cliente "
                . " AND p.id_cliente = $id_cliente AND finalizado = 'N'";
        return $this->select($this->db, $sql, false);
                
    }
    
    public function getPedido($id_pedido) {
        $sql = "SELECT * FROM pedido p, cliente c WHERE p.id_cliente = c.id_cliente "
                . " AND p.id_pedido = $id_pedido";
        return $this->select($this->db, $sql, false);
                
    }
    
    public function filtro($filtro) {
        $sql = "SELECT * FROM pedido ";
        if($filtro->data1){
            if($filtro->data2){
                $sql .= "WHERE data BETWEEN '$filtro->data1' AND '$filtro->data2'";
            }else{
                $sql .= "WHERE data = '$filtro->data1'";
            }
        }
        return $this->select($this->db, $sql);
                
    }
}
