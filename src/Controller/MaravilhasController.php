<?php
namespace Template\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use CoffeeCode\Uploader\Image;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Template\Entity\Maravilhas;

class MaravilhasController {

    private $view;
    private $entity;
    private $entityManager;
    private $entityRepository;
    private $router;
    private $image;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->view = new Engine(__DIR__ . '/../../views/admin/');
        $this->entity = new Maravilhas;
        $this->entityManager = $entityManager;
        $path = 'public/site/imgs';
        $this->image = new Image($path, "maravilhas", 600);
        $this->entityRepository = $entityManager->getRepository(Maravilhas::class);
        $this->router = new Router(URL_BASE);

    }
    public function create() {
        echo $this->view->render('create-maravilhas', []);
    }

    public function search(){
        echo $this->view->render('search-maravilhas', [
            'data' => $this->entityRepository->findAll()
        ]);
    }


    
 
    public function delete($data){

        $id = $data['id'];
        $manager = $this->entityManager;
        $entity = $manager->getReference(Maravilhas::class, $id);
        if (!empty($entity->getImage())) {
            unlink($entity->getImage());
           }
        $manager->remove($entity);
        $manager->flush();
        $this->router->redirect("/maravilhas/search");
    }


    public function edit($data) {
   
            echo $this->view->render('edit-maravilhas', [
                'edit' => $this->entityRepository->findBy(['id' => $data['id']]),
            ]);
    }

    public function update($data){
        var_dump($data);
        $id = $data['id'] ? intval($data['id']) : '';
        $manager = $this->entityManager;

        $entity = $manager->find(Maravilhas::class, $id);
        $entity->setTitle($data['title']);



        #Para aplicar imagens
        if($_FILES):
            var_dump($_FILES);
            try{ 
                $image = $this->image->upload($_FILES["image"], "maravilhas-image", 1200);
                $entity->setImage($image);}
            catch (Exception $e){
                echo "<p>(!) {$e->getMessage()}</p>";}
            endif;

   

        $manager->persist($entity);
        $manager->flush();
        //$this->router->redirect("/maravilhas/search");
  
    }


    public function persist($data) {

            $entity = $this->entity;
       
            $entity->setTitle($data['title']);
            $entity->setSection($data['section']);
            


            #Para aplicar imagens
            
            if($_FILES):
            try{ 
                $image = $this->image->upload($_FILES['image'], "maravilhas-image", 1200);
                $entity->setImage($image);}
            catch (Exception $e){
                echo "<p>(!) {$e->getMessage()}</p>";}
            endif;
       
           

            
            $this->entityManager->persist($entity);

        $this->entityManager->flush();
        $this->router->redirect("/maravilhas/search");
    }


}