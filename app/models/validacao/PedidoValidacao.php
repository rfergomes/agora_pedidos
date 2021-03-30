<?php
namespace app\models\validacao;

use app\core\Validacao;

class ClienteValidacao{
    public static function salvar($cliente){
        $validacao = new Validacao();
        
        $validacao->setData("cliente", $cliente->cliente);
        $validacao->setData("cpf", $cliente->cpf);
        $validacao->setData("cep", $cliente->cep);
        $validacao->setData("bairro", $cliente->bairro);
        $validacao->setData("cidade", $cliente->cidade);
        $validacao->setData("uf", $cliente->uf);
        $validacao->setData("senha", $cliente->senha);
        
        //fazendo a validação
        $validacao->getData("cliente")->isVazio();
        $validacao->getData("cep")->isVazio();
        $validacao->getData("bairro")->isVazio();
        $validacao->getData("cidade")->isVazio();
        $validacao->getData("uf")->isVazio();
        $validacao->getData("senha")->isVazio();
        
        return $validacao;
        
    }
}

