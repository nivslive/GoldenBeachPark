<?php
      require  __DIR__.DIRECTORY_SEPARATOR.'configuration'
                      .DIRECTORY_SEPARATOR.'Repositories'
                      .DIRECTORY_SEPARATOR.'Init.php';








                      Layout::title('Quem Somos');
                      



?> <section id="conteudo"> <?php
      Component::render('TopBar');
      Component::render('Menu');
      //Component::render('Banner', 'QuemSomos'); 
      
      foreach($banner as $b):
      $image =  $b->getImage();?>

<div class="row banner-all" id="banner-quemsomos" style="  background-image:url('<?php echo $image ?>');">
        <div class="center-align" >
           <li class="blue-text center-align" id="calltoaction-quemsomos"><span style="font-weight: bold;">Quem Somos </span> </li>
        </div>

      </div>

 
      <?php endforeach; ?>

<div class="wrapper">



  <?php 
  
      Component::render('Section', 'QuemSomos'); 
  
  
  
      Component::render('footer');
      ?></section><?php
        Layout::config('js'); ?>
<!--<script type="text/javascript" src="public/global/js/loading.js"></script> -->
</div>


