<?php
namespace Template\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use CoffeeCode\Uploader\Image;
use Doctrine\ORM\EntityManagerInterface;
use Template\Entity\Reservas;
use Doctrine\DBAL\Types\DateTimeType;
use DateTime;

class ReservasController {

    private $view;
    private $entity;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->view = new Engine(__DIR__ . '/../../views/admin/');
        $this->entity = new Reservas();
        $this->entityManager = $entityManager;
    }

    
    public function create() {
        echo $this->view->render('create-reserva', []);
    }

    public function search(){
        echo $this->view->render('search-reserva', []);
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
        $id = intval($data['id_atualizar']);
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



$entity = $this->entity;
$manager = $this->entityManager;

$entity->setAdultos(intval($data['adultos']));
$entity->setCriancas(intval($data['criancas']));
$entity->setApartamentos(intval($data['apartamentos']));
$entity->setNoites(intval($data['noites']));

/**$date_checkin = $data['checkin'];
$date_checkout = $data['checkout'];

$date_replace_checkin = str_replace('-' , '/' , $date_checkin);
$date_replace_checkout = str_replace('-' , '/' , $date_checkout);

$date_convert_checkin = strtotime($date_replace_checkin);
$date_convert_checkout = strtotime($date_replace_checkout);

$date_inicio = date('d/M/Y', $date_convert_checkin);
$date_fim = date('d/M/Y', $date_convert_checkout);

var_dump(new DateTime);
 */

$d_inicio = $data['checkin'];

$date_inicio = new Datetime($d_inicio);

$d_fim = $data['checkin'];
$date_fim = new Datetime($d_fim);

$entity->setInicio_data($date_inicio);
$entity->setFim_data($date_fim);



$manager->persist($entity);
$manager->flush();



  
    }


}