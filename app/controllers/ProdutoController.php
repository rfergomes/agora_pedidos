<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\ProdutoService;
use app\util\UtilService;

class ProdutoController extends Controller{
   private $tabela = "produto";
   private $campo  = "id_produto";
   
   public function __construct() {
        $this->usuario = UtilService::getUsuario();
        if (!$this->usuario) {
            $this->redirect(URL_BASE . "login");
            exit;
        }
    }
    
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "Produto/home";
       $this->load("template", $dados);
    }
    
    public function novo(){
        $dados["produto"] = Flash::getForm();
        $dados["view"] = "Produto/novo";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $produto = Service::get($this->tabela, $this->campo, $id);       
        if(!$produto){
            $this->redirect(URL_BASE."produto");
        }
        
        $dados["produto"]   = $produto;
        $dados["view"]      = "Produto/novo";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $produto = new \stdClass();
        $produto->id_produto        = $_POST["id_produto"];
        $produto->produto 		    = $_POST['produto'];
        $produto->endereco 		    = $_POST['endereco'];
        $produto->complemento 		= $_POST['complemento'];
        $produto->numero 			= $_POST['numero'];
        $produto->bairro 			= $_POST['bairro'];
        $produto->cidade 			= $_POST['cidade'];
        $produto->uf 		        = $_POST['uf'];
        $produto->cep		        = $_POST['cep'];
        $produto->celular	        = $_POST['celular'];
        $produto->cpf 			    = $_POST['cpf'];
        $produto->sexo		        = $_POST['sexo'];
        $produto->email		        = $_POST['email'];
        $produto->senha		        = $_POST['senha'];
        $produto->data_cadastro		= date("Y-m-d");
        
        Flash::setForm($produto);
        if(ProdutoService::salvar($produto, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."produto");
        }else{
            if(!$produto->id_produto){
                $this->redirect(URL_BASE."produto/novo");
            }else{
                $this->redirect(URL_BASE."produto/edit/".$produto->id_produto);
            }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."produto");
    }
    
    public function buscar($dados) {
        $produtos = Service::getLike("produto", "produto", $dados, true);
        echo json_encode($produtos);
    }
}

