<?php      require  __DIR__.DIRECTORY_SEPARATOR.'configuration'
                      .DIRECTORY_SEPARATOR.'Repositories'
                      .DIRECTORY_SEPARATOR.'Init.php';




      Layout::title('Estrutura');
          


      /**@params 
       * string $component;
       * string optional $page;
       **/

      Component::render('TopBar');
      Component::render('Menu');
      //Component::render('Banner', 'QuemSomos'); 
      
      foreach($banner as $b):
        $image =  $b->getImage();?>
  
  <div class="banner-all" id="banner-quemsomos" style="  background-image:url('<?php echo $image ?>');">
          <div class="center-align" >
             <li class="blue-text center-align" id="calltoaction-quemsomos"><span style="font-weight: bold;">Estrutura </span> </li>
          </div>
  
        </div>
  
   
        <?php break; endforeach; ?>






        
<div class="row" style=" margin-bottom: 0px !important;">
    <div class="col s12 m3 orange menu-section">

        <?php $menu_i = 1; ?>
        <ul id="tabs">
            <?php foreach ($data as $item):
        $title = $item->getTitle();

 ?>
            <li><a id="tab<?=$menu_i?>"><?=utf8_encode($title)?></a></li>
            <?php 
        $menu_i++;
        endforeach; ?>

            <!--      <li> Recepção </li>
        <li> Serviço de Quarto </li>
        <li> Serviço de Quarto </li>
        <li> Serviço de Quarto </li>
        <li> Serviço de Quarto </li>-->

        </ul>

    </div>
    <?php $section_i = 1; ?>

    <?php foreach ($data as $item):
        $title = $item->getTitle();
        $description = $item->getDescription();
        $image = $item->getImage();

 ?>
    <div class="col s12 m9  container-sections" id="tab<?=$section_i?>E" <?php $section_i++; ?> style="padding: 0 0 !important;">
        <div class="col s12 image-banner-section" style="background-image: url(<?=$image?>);    background-size: cover;">
            <!--   <img src="img/1.jpg" style="width: 100%"> -->
        </div>

        <div class="col s12" style="padding: 55px 55px; ">

            <h1 class="title__section" style="font-weight:bold"> <?=utf8_encode($title)?> </h1>
            <h5> <?=utf8_encode($description) ?> </h5>
        </div>


    </div>
    <?php
        
        endforeach; ?>




</div>

<!--footer section-->

<?php  Component::render('footer');
        Layout::config('Js'); ?>
