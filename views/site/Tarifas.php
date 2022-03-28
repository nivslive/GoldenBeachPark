<?php      require  __DIR__.DIRECTORY_SEPARATOR.'configuration'
                      .DIRECTORY_SEPARATOR.'Repositories'
                      .DIRECTORY_SEPARATOR.'Init.php';




                      Layout::title('Tarifas');


      /**@params 
       * string $component;
       * string optional $page;
       **/

      Component::render('TopBar');
      Component::render('Menu');
      //Component::render('Banner', 'QuemSomos'); 
      
      foreach($banner as $b):
        $image =  $b->getImage();?>
  
  <div class="row banner-all" id="banner-quemsomos" style="  background-image:url('<?php echo $image ?>');">
          <div class="center-align" >
             <li class="blue-text center-align" id="calltoaction-quemsomos"><span style="font-weight: bold;">Tarifas </span> </li>
          </div>
  
        </div>
  
   
        <?php break; endforeach; ?>



<?php 

foreach ($data as $d):
     $title =  utf8_encode($d->getTitle());
?>

<div class="container" id="section1services">


    <div class="row">

        <div class="col s12 m12 l12 center">

<h1><?= $title ?> </h1>

        </div>

    </div>
</div>


<?php foreach($itens as $i): 
      $item_title = utf8_encode($i->getTitle());

      $id_tarifa = $d->getId();
      $id_item = $i->getTarifa()->getId();

      $title_item = utf8_encode($i->getTitle());
      $description_item = utf8_encode($i->getDescription());
      $image_item = utf8_encode($i->getImage());



      if($id_tarifa == $id_item):
      ?>


<div class="container white-text" id="section1services">


    <div class="row section-tarifas">

        <div class="col s12 m6 l6 tarifas-form" style="padding: 25px">


 <h3 style="border-bottom: 1px solid white"><?= $title_item ?></h3>

 <?php   $prices = explode("//",$description_item); 
            foreach ($prices as $price):?>
<h5> <?=$price?></h5>
            <?php endforeach; ?>
        </div>








        <div class="col s12 m6 l6" id="image-fundo-tarifas">




            <div class="col s12 m6 l6" style="width:100%;height:28rem;
            overflow:hidden;    
            border-radius: 0px 50px 50px 0px;">
              <img src="<?=$image_item ?>" style="width: 200%">
            </div>


        </div>

    </div>
</div>

<?php endif; ?>
<?php endforeach; ?> 

<?php endforeach; ?> 




<!--footer section-->

 <?php  Component::render('footer');
        Layout::config('js'); ?>
