<?php
namespace Template\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use CoffeeCode\Uploader\Image;
use Doctrine\ORM\EntityManagerInterface;
use Template\Entity\Section;

class EstruturaController {

    private $view;
    private $entity;
    private $entityManager;
    private $entityRepository;
    private $router;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->view = new Engine(__DIR__ . '/../../views/admin/');
        $this->entity = new Section;
        $this->entityManager = $entityManager;
        $this->router = new Router(URL_BASE);
        $path = 'public/site/imgs';
        $this->image = new Image($path, "estrutura", 600);
        $this->entityRepository = $entityManager->getRepository(Section::class);
        $this->router = new Router(URL_BASE);

    }

    public function create() {
        echo $this->view->render('create-estrutura', []);
    }

    public function search(){
        echo $this->view->render('search-estrutura', [      
            'data' => $this->entityRepository->findBy(['section' => 'estrutura'])  ]);
    }

    public function edit($data) {
    
        echo $this->view->render('edit-estrutura', [
            'edit' => $this->entityRepository->findBy(['id' => $data['id']]),
        ]);
}


    
    public function delete($data){

        $id = $data['id'];
        $manager = $this->entityManager;
        $entity = $manager->getReference(Section::class, $id);
                if (!empty($entity->getImage())) {
            unlink($entity->getImage());
           }
        $manager->remove($entity);
        $manager->flush();
        $this->router->redirect("/estrutura/search");
    }


    public function update($data){
        $id = intval($data['id']);
        $manager = $this->entityManager;

        $entity = $manager->find(Section::class, $id);
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
        $this->router->redirect("/estrutura/search");
  
    }

    public function persist($data) {
 
        if($data['topic'] == 'estrutura'):
            echo "É".$data['topic']."!";
     
            
            $entity = $this->entity;


            $entity->setTitle($data['title']);
            $entity->setDescription($data['description']);
            $entity->setSection($data['topic']);
            
            
            $images = $this->image->multiple("files", $_FILES) ;
            
            if($images != null):
    
                   $i = 0;
                
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
            
    
    
            else:
                
                echo "imagens nulas";
                
            endif;
            
            

        else:
            echo "Não é estrutura! É...".$data['topic'];
        endif;
        
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
        $this->router->redirect("/estrutura/search");
    }





}