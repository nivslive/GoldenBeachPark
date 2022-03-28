<div class="slider-container">

<div class="slider-content">
    <?php 
    
    $slider_image = 0; 
    $slider = 1;
    foreach($data as $d): var_dump($d->getImage()); ?>
<?php
            $image = $d->getImage();?>
    <div class="slider-single slider-<?=$slider?>">
        <img class="slider-single-image"  id="slider-image-<?=$slider_image?>"  src="<?=$image?>" alt="<?=$slider?>" />
        <h1 class="slider-single-title">Through the Mountains</h1>
        <a class="slider-single-likes" href="javascript:void(0);">
            <i class="fa fa-heart"></i>
            <p>1,247</p>
        </a>
    </div>
    <?php
    $slider_image++;
    $slider++;
endforeach; ?>




</div>
</div>
