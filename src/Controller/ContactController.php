<?php
namespace Template\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use CoffeeCode\Uploader\Image;
use Doctrine\ORM\EntityManagerInterface;
use Template\Entity\Contact;


class ContactController {
    
    
    private $view;
    private $entity;
    private $entityManager;
    private $router;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->view = new Engine(__DIR__ . '/../../views/admin/');
        $this->entity = new Contact;
        $this->entityManager = $entityManager;
        $this->entityRepository = $entityManager->getRepository(Contact::class);
        $this->router = new Router(URL_BASE);
    }

    public function create() {
        echo $this->view->render('create-contact', []);
    }

    public function search(){
        echo $this->view->render('search-contact',  [
            'data' => $this->entityRepository->findAll()
        ]);
    }

    
    public function edit($data) {
        var_dump($data);
        echo $this->view->render('edit-contact', [
            'edit' => $this->entityRepository->findBy(['id' => $data['id']]),
        ]);
}




    
    public function delete($data){

        $id = $data['id'];
        $manager = $this->entityManager;
        $entity = $manager->getReference(Contact::class, $id);
        $manager->remove($entity);
        $manager->flush();
        $this->router->redirect("/contact/search");
    }


    public function update($data){
        $id = intval($data['id']);
        $manager = $this->entityManager;
        var_dump($id);
        $entity = $manager->find(Contact::class, $id);
        $entity->setName($data['name']);
        $entity->setTel($data['tel']);
        $entity->setEmail($data['email']);
        $entity->setMsg($data['msg']);
        $manager->persist($entity);
        $manager->flush();
        $this->router->redirect("/contact/search");
  
    }

    public function persist($data) {
        var_dump($data);
        $entity = $this->entity;
        $manager = $this->entityManager;
        if(isset($data['email'])):
            
            $entity->setEmail($data['email']);
            $entity->setName($data['name']);
            $entity->setTel($data['tel']);
            $entity->setEmail($data['email']);
            $entity->setMsg($data['msg']);


            $manager->persist($entity);
            $manager->flush();

        endif;

        $this->router->redirect("/home");

    }


     public function persistAdmin($data) {
        var_dump($data);
        $entity = $this->entity;
        $manager = $this->entityManager;
        if(isset($data['email'])):
            
            $entity->setEmail($data['email']);
            $entity->setName($data['name']);
            $entity->setTel($data['tel']);
            $entity->setEmail($data['email']);
            $entity->setMsg($data['msg']);


            $manager->persist($entity);
            $manager->flush();

        endif;


        $this->router->redirect("/contact/search");

    }


}