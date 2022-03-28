<?php      require  __DIR__.DIRECTORY_SEPARATOR.'configuration'
                      .DIRECTORY_SEPARATOR.'Repositories'
                      .DIRECTORY_SEPARATOR.'Init.php';



                     
                      Layout::title('Reservas');
               
                


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
                 <li class="blue-text center-align" id="calltoaction-quemsomos"><span style="font-weight: bold;">Reservas</span> </li>
              </div>
      
            </div>
      
       
            <?php endforeach;


      Component::render('Iframe', 'Reservas');   
      //Component::render('old', 'Home');?>




<!--footer section-->

 <?php  Component::render('footer');
        Layout::config('js'); ?>

