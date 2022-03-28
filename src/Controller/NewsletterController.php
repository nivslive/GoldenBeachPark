<?php
namespace Template\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Doctrine\ORM\EntityManagerInterface;

use Template\Entity\Newsletter;

class NewsletterController {

    private $view;
    private $entity;
    private $router;
    private $entityManager;
    private $entityRepository;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->view = new Engine(__DIR__ . '/../../views/admin/');
        $this->entity = new Newsletter;
        $this->router = new Router(URL_BASE);
        $this->entityManager = $entityManager;

        $this->entityRepository = $entityManager->getRepository(Newsletter::class);

    }
    
    
    public function create() {
        echo $this->view->render('create-newsletter', []);
    }

    public function search(){
          echo $this->view->render('search-newsletter', [
            'data' => $this->entityRepository->findAll()
        ]);

    }



   public function edit($data) {

        echo $this->view->render('edit-newsletter', [
            'edit' => $this->entityRepository->findBy(['id' => $data['id']]),
        ]);
}




    public function delete($data){

        $id = $data['id'];
        $manager = $this->entityManager;
        $entity = $manager->getReference(Newsletter::class, $id);
        $manager->remove($entity);
        $manager->flush();
        $this->router->redirect("/newsletter/search");
    }


    public function update($data){
        $id = intval($data['id']);
        $manager = $this->entityManager;

        $entity = $manager->find(Newsletter::class, $id);
        $entity->setEmail($data['email']);
        $manager->persist($entity);
        $manager->flush();
        $this->router->redirect("/newsletter/search");
  
    }


    public function persist($data) {

        $entity = $this->entity;
        $manager = $this->entityManager;
        if(isset($data['email'])):
            
            $entity->setEmail($data['email']);
            $manager->persist($entity);
            $manager->flush();

        endif;
        

        $this->router->redirect("/home");

    }


        public function persistAdmin($data) {


        $entity = $this->entity;
        $manager = $this->entityManager;
        if(isset($data['email'])):
            
            $entity->setEmail($data['email']);
            $manager->persist($entity);
            $manager->flush();

        endif;
        
        $this->router->redirect("/newsletter/search");


    }



}