<?php      require  __DIR__.DIRECTORY_SEPARATOR.'configuration'
                      .DIRECTORY_SEPARATOR.'Repositories'
                      .DIRECTORY_SEPARATOR.'Init.php';




      Layout::title('Fortaleza');
          


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
             <li class="blue-text center-align" id="calltoaction-quemsomos">   <h3>
                 Conheça <br>
<strong>

        Fortaleza
       </strong>
       </h3> </li>
          </div>
  
        </div>
  
   
        <?php break; endforeach; ?>




        <div class="row" style=" margin-bottom: 0px !important;">
    <div class="col s12" style="text-align:center"><h2 style="font-size:2rem">
 <strong>  Fortaleza é diversão sem fim. Esbanjando 34 km de litoral, rica cena cultural e muitas opções de lazer, </strong>a capital do Ceará é cheia de história e de infinitas opções de roteiro. Em outras palavras, fica difícil saber por onde começar.</h2>
       </div>



    </div>

        
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

            <h1 class="title__section"> <?=utf8_encode($title)?> </h1>
            <h5> <?=utf8_encode($description) ?> </h5>
        </div>


    </div>
    <?php
        
        endforeach; ?>




<style>
.fIframe {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 1rem;
}

@media (min-width: 993px){ 
.fIframe iframe {
    width: 80%;
    height: 45vw;
    max-height: 580px;
    max-width: 1600px;
}}

.fIframe iframe {
    width: 100%;
    height: 42vw;
    max-width: 1200px;
}
    </style>
<div class="row" style=" margin-bottom: 0px !important;">
    <div class="col s12" style="text-align:center"><section class="fIframe">
            <iframe width="100%" height="325" src="https://www.youtube.com/embed/NNRnWIWEUJI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </section>
       </div>



    </div>


</div>

<!--footer section-->

<?php  Component::render('footer');
        Layout::config('Js'); ?>
