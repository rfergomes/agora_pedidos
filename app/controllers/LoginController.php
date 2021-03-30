<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\Service;

class LoginController extends Controller{
    public function index(){
        $dados["view"] = "Login/login";
        $this->load("Login/login", $dados);
    }
    public function logar(){
        $login = $_POST["email"];
        $senha = $_POST["senha"];
        
        Flash::setForm($_POST);
        if( Service::logar("email", $login, $senha, "cliente")){
            $this->redirect(URL_BASE );
        }else{
            $this->redirect(URL_BASE ."login");
        }
    }
    
    public function esqueci(){
        
        $this->load("Login/login");
    }
    
    public function logout(){
        unset($_SESSION[SESSION_LOGIN]);
        $this->redirect(URL_BASE ."login");
    }
}

