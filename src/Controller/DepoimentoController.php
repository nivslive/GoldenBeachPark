<?php
namespace Template\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Doctrine\ORM\EntityManagerInterface;
use Template\Entity\Depoimento;

class DepoimentoController {

    private $view;
    private $entity;
    private $entityManager;
    private $entityRepository;
    private $router;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->view = new Engine(__DIR__ . '/../../views/admin/');
        $this->entity = new Depoimento;
        $this->entityManager = $entityManager;
        $this->router = new Router(URL_BASE);
        $this->entityRepository = $entityManager->getRepository(Depoimento::class);

    }

    public function create() {
        echo $this->view->render('create-depoimento', []);
    }

    public function search(){
        echo $this->view->render('search-depoimento', [      
            'data' => $this->entityRepository->findAll()  ]);
    }

    public function edit($data) {
        var_dump($data);
        echo $this->view->render('edit-depoimento', [
            'edit' => $this->entityRepository->findBy(['id' => $data['id']]),
        ]);
}


    
    public function delete($data){

        $id = $data['id'];
        $manager = $this->entityManager;
        $entity = $manager->getReference(Depoimento::class, $id);
        $manager->remove($entity);
        $manager->flush();
        $this->router->redirect("/depoimentos/search");
    }


    public function update($data){
        $id = intval($data['id']);
        $manager = $this->entityManager;
        var_dump($id);
        $entity = $manager->find(Depoimento::class, $id);
        $entity->setName($data['name']);
        $entity->setDepoimento($data['depoimento']);
        $manager->persist($entity);
        $manager->flush();
        $this->router->redirect("/depoimentos/search");
  
    }

    public function persist($data) {
 

            
            $entity = $this->entity;
            $manager =  $this->entityManager;


            $entity->setName($data['name']);
            $entity->setDepoimento($data['depoimento']);
            $manager->persist($entity);
            $manager->flush();
        $this->router->redirect("/depoimentos/search");
    }





}