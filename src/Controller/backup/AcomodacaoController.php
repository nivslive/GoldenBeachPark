<?php

namespace Template\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use CoffeeCode\Uploader\Image;
use Template\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Template\Entity\Acomodacao;
use Template\Entity\ItensAcomodacao;


class AcomodacaoController 
{
    use FlashMessageTrait;

    private $view;
    private $router;
    private $image;
    private $entity;
    private $repository;
    private $repositoryItens;
    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->view = new Engine(__DIR__ . '/../../views/admin/');
        $this->entityManager = $entityManager;
        $this->entity = new Acomodacao;
        $this->repository = $entityManager->getRepository(Acomodacao::class);
        $this->repositoryItens = $entityManager->getRepository(ItensAcomodacao::class);
        $path = 'public/site/imgs';
        $this->image = new Image($path, "acomodacao", 600);
        $this->router = new Router(URL_BASE);
    }

    public function create() {
        echo $this->view->render('create-acomodacao', []);
    }
   
   
    public function search(){
        echo $this->view->render('search-acomodacao', [      
            'data' => $this->repository->findAll()
        
        ]);
    }


    public function edit($data) {

        echo $this->view->render('edit-acomodacao', [
            'edit' => $this->repository->findBy(['id' => $data['id']])
        ]);
}



public function itens_create($data) {
 $id = $data['id'];
 echo $this->view->render('create-itens-acomodacao', ['global_id' => $id,      
 'data' => $this->repositoryItens->findBy(['acomodacao' => $id])]);
}

public function itens_persist($data){
    $id = $data['id'];
    $manager = $this->entityManager;
    $entity = $manager->find(Acomodacao::class, $id);

    $itens =  new ItensAcomodacao;
    $title =$data['title']; 
    $description = $data
    ['description'];
    $images = $this->image->multiple("files", $_FILES);
    $itens->setAcomodacao($entity);
    $itens->setName($title);
    $itens->setDescription($description);

    foreach($images as $file):
    $path = $this->image->upload($file, "acomodacao-image", 1200);
    $itens->setImage($path);
    endforeach;



    $manager->persist($itens);
    $manager->flush();


    $this->router->redirect("/acomodacao/search");
}


    public function itens_search($data){
        $id = $data['id'];

        echo $this->view->render('search-itens-acomodacao', ['global_id' => $id,      
            'data' => $this->repositoryItens->findBy(['acomodacao' => $id])]);
    }



    public function itens_update($data){
        $id = intval($data['id']);
        $manager = $this->entityManager;

        $entity = $manager->find(ItensAcomodacao::class, $id);
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
        $this->router->redirect("/acomodacao/search");
  
    }

    public function itens_delete($data){
        
        $id = $data['id'];

        $manager = $this->entityManager;
        $entity = $manager->getReference(ItensAcomodacao::class, $id);
        $manager->remove($entity);
        $manager->flush();

        $this->router->redirect("/acomodacao/search");
    }

    public function itens_edit($data){
        $id = $data['id'];
        echo $this->view->render('edit-itens-acomodacao', ['global_id' => $id,      
        'edit' => $this->repositoryItens->findBy(['acomodacao' => $id])]);
    }

    public function delete($data){
        $id = $data['id'];
        $manager = $this->entityManager;
        $entity = $manager->getReference(Acomodacao::class, $id);
        if (!empty($entity->getImage())) {
            unlink($entity->getImage());
           }
        $manager->remove($entity);
        $manager->flush();
        $this->router->redirect("/acomodacao/search");
    }



    

    public function update($data){
        $id = intval($data['id']);
        $manager = $this->entityManager;
        $entity = $manager->find(Acomodacao::class, $id);
        $entity->setTitle($data['title']);
        $entity->setSubtitle($data['description']);


        #Para aplicar imagens
                $images = $this->image->multiple("files", $_FILES) ;
                    if($images != null): $i = 0;
                        foreach ($images as $file):
                        if($file["size"] > 0):
                            if(!file_exists($entity->getImage())):
                                echo "O arquivo não existe! Será feito o upload!";

                            $path_base= $this->image->upload($file, "estrutura-image-" . $i, 1200);
                            $entity->setImage($path_base);        
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
        $this->router->redirect("/acomodacao/search");
  
    }


    public function persist($data) {
        var_dump($data);
        $entity = $this->entity;
        //$itens = $this->itens;
        $manager = $this->entityManager;
        //$repository = $this->repository;
        #Para aplicar imagens
        if($_FILES):
            var_dump($_FILES);
            try{ 
                $image = $this->image->upload($_FILES["image"], "maravilhas-image", 1200);
                $entity->setImage($image);}
            catch (Exception $e){
                echo "<p>(!) {$e->getMessage()}</p>";}
            endif;
 
        $entity->setTitle($data['title']);
        $entity->setSubtitle($data['description']);
        
        for($i = 1; $data['item_id_value'] >= $i; $i++):
       var_dump($data);
            $title =$data['title_item_'.$i]; 
            $description = $data
            ['description_item_'.$i];

            $itens = new ItensAcomodacao;

            $itens->setName($title);
            $itens->setDescription($description);
   
            $path = $this->image->upload($file, "acomodacao-image-" . $i, 1200);
            $itens->setImage($path);
         
            $entity->addItem($itens);


        endfor;
    
            $manager->persist($entity);
            $manager->flush();
            $this->router->redirect("acomodacao/search");
        
    }

  


    

}
