<?php
namespace Template\Security;
use CoffeeCode\Router\Router;
use League\Plates\Engine;
use Template\Helper\FlashMessageTrait;

class Guard {

    use FlashMessageTrait;

    private $router;
    private $view;

    public function __construct() {
        $this->router = new Router(URL_BASE);
        $this->view = new Engine(__DIR__ . '/../../views/admin/');
    }

    public function VerifyLogin(){
        if (!isset($_SESSION['logado'])) {
            
            
            $this->router->redirect("/admin");
            exit();
        }        
        else {
            $_SESSION['message'] = "Sucesso! Seja bem vindo ao Dashboard!";
            echo $_SESSION['message'];
            $this->router->redirect("/dashboard");
        }

    }


    public function tentativaPainel() {
        if(isset($_SESSION['logado']) or !$_SESSION['logado']):
        
        $_SESSION['msg'] = "Tentativa de entrada abrupta no painel administrativo. Foi barrado pela segurança do nosso servidor.";
        $_SESSION['logado'] = false;
        echo $this->view->render('index', []);

    else:
            $_SESSION['msg'] = "Você está logado. Seja bem vindo.";
            $this->router->redirect("/dashboard");
        endif;


    }



}
