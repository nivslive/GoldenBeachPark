<?php
namespace Template\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use CoffeeCode\Uploader\Image;
use Doctrine\ORM\EntityManagerInterface;
use Template\Entity\Diferenciais;

class DiferenciaisController {

    private $view;
    private $entity;
    private $entityManager;
    private $entityRepository;
    private $router;
    private $image;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->view = new Engine(__DIR__ . '/../../views/admin/');
        $this->entity = new Diferenciais;
        $this->entityManager = $entityManager;
        $path = 'public/site/imgs';
        $this->image = new Image($path, "diferenciais", 600);
        $this->entityRepository = $entityManager->getRepository(Diferenciais::class);
        $this->router = new Router(URL_BASE);

    }
    public function create() {
        echo $this->view->render('create-diferenciais', []);
    }

    public function search(){
        echo $this->view->render('search-diferenciais', [
            'data' => $this->entityRepository->findAll()
        ]);
    }


    
 
    public function delete($data){

        $id = $data['id'];
        $manager = $this->entityManager;
        $entity = $manager->getReference(Diferenciais::class, $id);
                if (!empty($entity->getImage())) {
            unlink($entity->getImage());
           }
        $manager->remove($entity);
        $manager->flush();
        $this->router->redirect("/diferenciais/search");
    }


    public function edit($data) {
      
            echo $this->view->render('edit-diferenciais', [
                'edit' => $this->entityRepository->findBy(['id' => $data['id']]),
            ]);
    }

    public function update($data){

        $id = intval($data['id']);
        $manager = $this->entityManager;

        $entity = $manager->find(Diferenciais::class, $id);
        $entity->setTitle($data['title']);


            #Para aplicar imagens
            $images = $this->image->multiple("files", $_FILES) ;
            if($images != null): $i = 0;
                foreach ($images as $file):
                if($file["size"] > 0):
    
          
                    $path= $this->image->upload($file, "diferenciais-image-" . $i, 1200);
                    $entity->setImage($path);        
                     $i++;
                
            endif;
        endforeach;
            else: echo "imagens nulas";
            endif;
    






        $manager->persist($entity);
        $manager->flush();
        $this->router->redirect("/diferenciais/search");
  
    }


    public function persist($data) {

            $entity = $this->entity;
       
            $entity->setTitle($data['title']);

            


            #Para aplicar imagens
        $images = $this->image->multiple("files", $_FILES) ;
        if($images != null): $i = 0;
            foreach ($images as $file):
            if($file["size"] > 0):

      
                $path= $this->image->upload($file, "diferenciais-image-" . $i, 1200);
                $entity->setImage($path);        
                 $i++;
            
        endif;
    endforeach;
        else: echo "imagens nulas";
        endif;

           

            
            $this->entityManager->persist($entity);

        $this->entityManager->flush();

        $this->router->redirect("/diferenciais/search");
}


}