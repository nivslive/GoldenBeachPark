<?php      require  __DIR__.DIRECTORY_SEPARATOR.'configuration'
                      .DIRECTORY_SEPARATOR.'Repositories'
                      .DIRECTORY_SEPARATOR.'Init.php';




                      Layout::config('Head');
                      Layout::title('Golden Beach Hotel');
                      Layout::config('endHead');


      /**@params 
       * string $component;
       * string optional $page;
       **/

      Component::render('TopBar');
      Component::render('Menu');
      Component::render('Banner', 'Home');   
      //Component::render('old', 'Home');?>




<!--footer section-->

 <?php  Component::render('footer');
        Layout::config('js'); ?>
