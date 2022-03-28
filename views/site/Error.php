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

      //Component::render('Warning', 'Error');   
     ?>
 <div class="row" id="banner">
        <div class="center-align" >
           <li class="blue-text" id="calltoaction"><span style="font-weight: bold;"></span><br>  <span class="blue-text">Erro!</span>!</li>
           <li id="calltoaction2" class="blue-text">Retorne para a Home. <br>
         Código do Erro: <?=$data['errcode']?></li>
           <a href="home" class="btn btn-large blue waves-effect waves-light" id="calltoaction3"><i style="transform:rotate(180deg)" class="material-icons right">arrow_forward</i>Retornar para a Home</a>
        </div>


      </div>



<!--footer section-->

 <?php  
        Layout::config('js'); ?>
