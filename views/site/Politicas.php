<?php      require  __DIR__.DIRECTORY_SEPARATOR.'configuration'
                      .DIRECTORY_SEPARATOR.'Repositories'
                      .DIRECTORY_SEPARATOR.'Init.php';



                      Layout::title('Politicas');
                  


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
             <li class="blue-text center-align" id="calltoaction-quemsomos"><span style="font-weight: bold;">Politicas </span> </li>
          </div>
  
        </div>
  
   
        <?php break; endforeach; ?>



  <!--services content-->
  <div class="container" style="margin-bottom: 2rem" id="section1services">


<div class="row">

    <div class="col s12 m12 l12 right ">

        
        <?php foreach($data as $d):
                              $title = utf8_encode($d->getTitle());
                              $description = utf8_encode($d->getPoliticas()); ?>


        <h2  class="title-text" style="font-weight:bold"><?=$title?></h2>
       
        <?=$description?>

            <?php endforeach; ?>
    </div>

</div>
</div>



<!--footer section-->

 <?php  Component::render('footer');
        Layout::config('js'); ?>
