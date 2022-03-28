<?php


      require  __DIR__.DIRECTORY_SEPARATOR.'configuration'
                      .DIRECTORY_SEPARATOR.'Repositories'
                      .DIRECTORY_SEPARATOR.'Init.php';




      Layout::config('Head');
      Layout::title('Acomodações'); 
      ?>
    <style>


@media (max-width:512px){
    .conteiner_info_acomodacoes  {
    flex-direction:column;
}    
}

    .section-acomodacoes {
        display:flex;
    }
    @media (max-width:1137px) {
        .section-acomodacoes {
        flex-direction: column;
    }
    }
    .acomodacoes-form {
        width:56em !important;
  
    }

    @media (max-width:1495px){
        .acomodacoes-form {
        width:36vw !important;
    }
    }

    @media (max-width:1137px) {
        .acomodacoes-form {
        width:80vw !important;
    }
    }

    </style>

      <?php 
      
      Layout::config('endHead');


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
                 <li class="blue-text center-align" id="calltoaction-quemsomos"><span style="font-weight: bold;">Acomodações </span> </li>
              </div>
      
            </div>
      
       
            <?php break; endforeach; 
    
      

      
      if(!empty($acomodacao)):
        try { 
        foreach($acomodacao as $id =>$item):

            $title = utf8_encode($item->getTitle());
            $subtitle = utf8_encode($item->getSubtitle());
            $principal_image = utf8_encode($item->getImage());
       

            
               

          


      ?><div  class="tarifas-margin">
          
          <section> 
<div class="row">
    <div class="center-align">
        <li class="blue-text center-align"><span style="font-weight: bold; font-size: 2rem;"><?=$title?> </span> </li>


        <li class="blue-text center-align"><span style="font-size: 1rem;"><?=$subtitle?> </span> </li>
    </div>

</div>




<div class=" white-text" id="section1services">


    <div class="row section-acomodacoes">

        <div class="col s12 m6 l6 acomodacoes-form form-acomodacoes-section" style="padding: 25px;       height: 100% ;">


        <div class="center-acomodacoes">
     
        
<?php //$principal_image = $itens[0]->getImage(); ?>

<?php foreach($itens as $i): 


$id_acomodacao = $i->getAcomodacao()->getId();


    if($item->getId() == $id_acomodacao):
        
        $item_name = utf8_encode($i->getName());
        $item_image =  $i->getImage();
        $item_desc =  utf8_encode($i->getDescription());
    ?>

 





   <li>
                    <div class="flow-text conteiner_info_acomodacoes" style="display:flex;">
                        <img class="img-acomodacoes"  src="<?=$item_image?>">
                        <span>
                            <h5 class="left-align"><?=$item_name?> </h5>
                            <h6 class="left-align"><?=$item_desc?> </h6>
                        </span>

                    </div>
                </li>



                <?php 
            
        endif;


    endforeach;     
            ?>

   
                </div>

        </div>
<?php


        if(!$principal_image == null):
?>
        <div class="col s12 m6 l6 acomodacoes-form img-acomodacoes-section" style="padding: 25px;background-size:cover;     background-image: url('<?=URL_BASE.$principal_image?>');min-height:32rem;">

        <?php else: 
            
            $example_image_path = 'public/site/imgs/default.jpeg';
            ?>

        <div class="col s12 m6 l6 acomodacoes-form img-acomodacoes-section" style="padding: 25px;background-size:cover;     background-image: url('<?=URL_BASE.$example_image_path?>'); min-height:32rem;">

    <?php endif; ?>

     </div>



    </div>
</div>



</section>

          
          <?php
      




      ?></div><?php
    endforeach; 
}
catch(Exception $e){
    ?>
    
    
    <div class="row">
       <div class="center-align">
   <li class="blue-text center-align"><span style="font-weight: bold; font-size: 2rem;">Falha no retorno dos dados. Tente novamente mais tarde. </span> </li>


               <li class="blue-text center-align"><span style="font-size: 1rem;"> Relatório do Erro: <?=$e?> </span> </li>
</div>

</div>
    
    
    
    <?php
}

endif;  ?>

</section>



<?php
      //Component::render('old', 'Home');?>




<!--footer section-->

 <?php  Component::render('footer');
        Layout::config('js'); ?>
