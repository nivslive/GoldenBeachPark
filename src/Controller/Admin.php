<?php
namespace Template\Controller;
use CoffeeCode\Router\Router;
use League\Plates\Engine;
use Template\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Template\Entity\User;

class Admin 
{
    use FlashMessageTrait;

    private $view;
    private $router;
    private $repository;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->view = new Engine(__DIR__ . '/../../views/admin/');
        $this->repository = $entityManager->getRepository(User::class);
        $this->router = new Router(URL_BASE);

    }


public function index() {
    if(Isset($_SESSION['logado']) and $_SESSION['logado']):
        unset($_SESSION['msg']);
        $_SESSION['msg'] = "Logado com sucesso! Seja muito bem vindo!";
        $this->router->redirect("/dashboard");

else:
        echo $this->view->render('index', []);
endif;
}

  


    public function login($data)
    {

        $user_login = filter_var(
           $data['user'],
            FILTER_SANITIZE_STRING
        );

        $password = filter_var(
            $data['password'],
             FILTER_SANITIZE_STRING
         );

         $hashed = password_hash($password, PASSWORD_DEFAULT);

         $user_verify = $this->repository->findOneBy(['user' => $user_login]);

        

          if(is_null($user_verify)){
             $this->defineMensagem('danger', 'Não existe essa conta!');
             $this->router->redirect("/dashboard/logout");
          }
          else {

    /** @var User $user */
    $pass = $user_verify->getPassword();
    $auth =  password_verify($pass, $hashed);
    if ($auth == true) {

        $_SESSION['logado'] = true;
        $_SESSION['msg'] = "Autenticação feita com sucesso";

        $this->defineMensagem('success', 'Bem vindo ao painel!');
        $this->router->redirect("/dashboard");
    }

    elseif($auth == false) {

        $_SESSION['logado'] = false;
        $this->defineMensagem('danger', 'Usuário ou senha inválidos');
        $this->router->redirect("/dashboard/logout");
    } 




          }

    
    }
    
    public function logout() {
        $_SESSION['logado'] = false;
        $this->router->redirect("/admin");
    }

    public function painel()
    {
        echo $this->view->render('painel', []);
    }




    public function search()
    {
        echo $this->view->render('search', []);
    }





}

