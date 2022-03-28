<?php
namespace Template\Controller;

use CoffeeCode\Router\Router;
use League\Plates\Engine;
use Template\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;

class Error 
{
    use FlashMessageTrait;

    private $view;
    private $router;
    private $repository;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->view = new Engine(__DIR__ . '/../../views/site/');


    }



    public function error_404($data)
    {
        echo $this->view->render('Error', ['data' => $data]);
    }





}

