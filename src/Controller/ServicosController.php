<?php
namespace Template\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use CoffeeCode\Uploader\Image;
use Doctrine\ORM\EntityManagerInterface;
use Template\Entity\Servico;

class ServicosController {

    private $view;
    private $entity;
    private $entityManager;
    private $entityRepository;
    private $router;
    private $image;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->view = new Engine(__DIR__ . '/../../views/admin/');
        $this->entity = new Servico;
        $this->entityManager = $entityManager;
        $path = 'public/site/imgs';
        $this->image = new Image($path, "servicos", 600);
        $this->entityRepository = $entityManager->getRepository(Servico::class);
        $this->router = new Router(URL_BASE);

    }
    public function create() {
        echo $this->view->render('create-servicos', []);
    }

    public function search(){
        echo $this->view->render('search-servicos', [
            'data' => $this->entityRepository->findAll()
        ]);
    }


    
 
    public function delete($data){

        $id = $data['id'];
        $manager = $this->entityManager;
        $entity = $manager->getReference(Servico::class, $id);
        if (!empty($entity->getImage())) {
                unlink($entity->getImage());
               }
        $manager->remove($entity);
        $manager->flush();
        $this->router->redirect("/servicos/search");
    }


    public function edit($data) {
     
            echo $this->view->render('edit-servicos', [
                'edit' => $this->entityRepository->findBy(['id' => $data['id']]),
            ]);
    }

    public function update($data){

        $id = intval($data['id']);
        $manager = $this->entityManager;

        $entity = $manager->find(Servico::class, $id);
        $entity->setDescription($data['description']);

        $images = $this->image->multiple("files", $_FILES) ;


        if($images != null):
            $i = 0;
     foreach ($images as $file):
         if($file["size"] > 0):

                 echo "O arquivo não existe! Será feito o upload!";
             $path= $this->image->upload($file, "banner-image-" . $i, 1200);
             //if(is_null($this->entityRepository->find(['image' => $path]))): 
             $entity->setImage($path);
             //endif;
              $i++;
             else:
                 echo "O arquivo existe! Não será feito o upload!";

     endif;
     endforeach;
     else:
         echo "imagens nulas";
     endif;





        $manager->persist($entity);
        $manager->flush();
        $this->router->redirect("/servicos/search");
  
    }


    public function persist($data) {

            $entity = $this->entity;
            $entity->setDescription($data['description']);            
            $images = $this->image->multiple("files", $_FILES) ;


         
            
            if($images != null):
                   $i = 0;
            foreach ($images as $file):
                if($file["size"] > 0):

                        echo "O arquivo não existe! Será feito o upload!";
                    $path= $this->image->upload($file, "servicos-image-" . $i, 1200);
                    //if(is_null($this->entityRepository->find(['image' => $path]))): 
                    $entity->setImage($path);
                    //endif;
                     $i++;
                    else:
                        echo "O arquivo existe! Não será feito o upload!";

            endif;
            endforeach;
            else:
                echo "imagens nulas";
            endif;
            

            
        $this->entityManager->persist($this->entity);
        $this->entityManager->flush();
        $this->router->redirect("/servicos/search");
    }


}