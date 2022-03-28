<?php
namespace Template\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use CoffeeCode\Uploader\Image;
use Doctrine\ORM\EntityManagerInterface;
use Template\Entity\Politica;

class PoliticasController {
    
    
    private $view;
    private $entity;
    private $repository;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->view = new Engine(__DIR__ . '/../../views/admin/');
        $this->entity = new Politica;
        $this->entityManager = $entityManager;
        $this->router = new Router(URL_BASE);
        $this->repository = $entityManager->getRepository(Politica::class);
    }

    public function create() {
        echo $this->view->render('create-politica', []);
    }

    public function search(){
        echo $this->view->render('search-politica', ['data'
    => $this->repository->findBy(['id' => '1'])]);
    }



    public function delete($data){

        $id = $data['id'];
        $manager = $this->entityManager;
        $entity = $manager->getReference(Section::class, $id);
        $manager->remove($entity);
        $manager->flush();
        $this->router->redirect("/estrutura/search");
    }


    public function update($data){
       // $id = intval($data['id_atualizar']);
        
       $id = '1';
       $manager = $this->entityManager;
        $entity = $manager->find(Politica::class, $id);
        $entity->setTitle($data['title']);
        $entity->setPoliticas($data['description']);





        $manager->persist($entity);
        $manager->flush();
        $this->router->redirect("/politicas/search");
  
    }


    public function persist($data) {
     
        $entity = $this->entity;
        $manager = $this->entityManager;
        $entity->setTitle($data['title']);
        $entity->setPoliticas($data['description']); 
        $manager->persist($entity);
        $manager->flush();

           }

}