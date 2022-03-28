<?php
namespace Template\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use CoffeeCode\Uploader\Image;
use Doctrine\ORM\EntityManagerInterface;
use Template\Entity\ItensTarifa;
use Template\Entity\Tarifa;

class TarifasController {

    private $view;
    private $entityManager;
    private $repository;
    private $repositoryItens;
    private $entity;
    private $router;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->view = new Engine(__DIR__ . '/../../views/admin/');
        $path = 'public/site/imgs';
        $this->image = new Image($path, "tarifas", 600);
        $this->repository = $entityManager->getRepository(Tarifa::class);
        $this->repositoryItens = $entityManager->getRepository(ItensTarifa::class);
        $this->entity = new Tarifa();
        $this->router = new Router(URL_BASE);
        $this->entityManager = $entityManager;
    }

    public function create() {
        echo $this->view->render('create-tarifa', []);
        
    }

    public function search(){
        echo $this->view->render('search-tarifas', [    
        'data' => $this->repository->findAll()]);
    }



    public function itens_create($data) {
        $id = $data['id'];
        echo $this->view->render('create-itens-tarifas', ['global_id' => $id,      
        'data' => $this->repositoryItens->findBy(['tarifa' => $id])]);
       }
       
       public function itens_persist($data){
           $id = $data['id'];
           $manager = $this->entityManager;
           $entity = $manager->find(Tarifa::class, $id);
       
           $itens =  new ItensTarifa;
           $title =$data['title']; 
           $description = $data
           ['description'];
           $images = $this->image->multiple("files", $_FILES);
           $itens->setTarifa($entity);
           $itens->setTitle($title);
           $itens->setDescription($description);
       
           foreach($images as $file):
           $path = $this->image->upload($file, "tarifas-image", 1200);
           $itens->setImage($path);
           endforeach;
       
       
       
           $manager->persist($itens);
           $manager->flush();
       
       
           $this->router->redirect("/tarifas/search");
       }
       
       
           public function itens_search($data){
               $id = $data['id'];
       
               echo $this->view->render('search-itens-tarifas', ['global_id' => $id,      
                   'data' => $this->repositoryItens->findBy(['tarifa' => $id])]);
           }
       
       
       
           public function itens_update($data){
            $id = intval($data['id_update']);
        $manager = $this->entityManager;

        $entity = $manager->find(ItensTarifa::class, $id);
        $entity->setTitle($data['title']);
        $entity->setDescription($data['description']);


        #Para aplicar imagens
        $images = $this->image->multiple("files", $_FILES) ;
            if($images != null): $i = 0;
                foreach ($images as $file):
                if($file["size"] > 0):
                    if(!file_exists($entity->getImage())):
                        echo "O arquivo não existe! Será feito o upload!";
          
                    $path= $this->image->upload($file, "estrutura-image-" . $i, 1200);
                    $entity->setImage($path);        
                     $i++;
                    else:
                        echo "O arquivo existe! Não será feito o upload!";
                endif;
            endif;
        endforeach;
            else: echo "imagens nulas";
            endif;






        $manager->persist($entity);
        $manager->flush();

         
           }
       
           public function itens_delete($data){
               
               $id = $data['id'];
       
               $manager = $this->entityManager;
               $entity = $manager->getReference(ItensTarifa::class, $id);
               if (!empty($entity->getImage())) {
                unlink($entity->getImage());
                 }
               $manager->remove($entity);
               $manager->flush();
       
               $this->router->redirect("/tarifas/search");
           }
       
           public function itens_edit($data){
               $id = $data['id'];
               echo $this->view->render('edit-itens-tarifas', ['global_id' => $id,      
               'edit' => $this->repositoryItens->findBy(['id' => $id])]);
           }


           public function delete($data){

            $id = $data['id'];
            $manager = $this->entityManager;
            $entity = $manager->getReference(Tarifa::class, $id);
            $manager->remove($entity);
            $manager->flush();
            $this->router->redirect("/tarifas/search");
        }
    

        public function edit($data) {
            var_dump($data);
            echo $this->view->render('edit-tarifas', [
                'edit' => $this->repository->findBy(['id' => $data['id']]),
            ]);
    }

    public function update($data){
        $id = intval($data['id']);
        var_dump($data['title']);
        $manager = $this->entityManager;
        $entity = $manager->find(Tarifa::class, $id);
        $entity->setTitle($data['title']);
 




            #Para aplicar imagens
            $images = $this->image->multiple("files", $_FILES) ;
            if($images != null): $i = 0;
                foreach ($images as $file):
                if($file["size"] > 0):
    
          
                    $path= $this->image->upload($file, "tarifas-image-" . $i, 1200);
                    $entity->setImage($path);        
                     $i++;
                
            endif;
        endforeach;
            else: echo "imagens nulas";
            endif;
    





        $manager->persist($entity);
        $manager->flush();
        $this->router->redirect("/tarifas/search");
  
    }


    public function persist($data) {

        $entity = $this->entity;
        //$itens = $this->itens;
        $manager = $this->entityManager;
        $entity->setTitle($data['title']);
        $repository = $this->repository;
        $images = $this->image->multiple("files", $_FILES);
 
       
        for($i = 1; $data['item_id_value'] >= $i; $i++):
            var_dump($data);
                 $title =$data['title_item_'.$i]; 
                 $description = $data
                 ['description_item_'.$i];
     
                 $itens = new ItensTarifa;
     
                 $itens->setTitle($title);
                 $itens->setDescription($description);
                 foreach($images as $file):
                 $path = $this->image->upload($file, "tarifa-image-" . $i, 1200);
                 $itens->setImage($path);
                 endforeach;
                 $entity->addItem($itens);
     
     
             endfor;
         
                 $manager->persist($entity);
                 $manager->flush();



    
    }


}