<?php

namespace app\controllers;

use app\core\Controller;

class PedidoController extends Controller {

    /*public function __construct() {
        $this->usuario = UtilService::getUsuario();
        if (!$this->usuario) {
            $this->redirect(URL_BASE . "login");
            exit;
        }
    }*/

    public function index() {
        $dados["view"] = "Pedido/home";
        $this->load("template", $dados);
    }
    
    public function novo() {
        $dados["view"] = "Pedido/novo";
        $this->load("template", $dados);
    }

}
