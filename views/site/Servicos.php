<?php      require  __DIR__.DIRECTORY_SEPARATOR.'configuration'
                      .DIRECTORY_SEPARATOR.'Repositories'
                      .DIRECTORY_SEPARATOR.'Init.php';




                  Layout::title('Serviços');
                

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
                 <li class="blue-text center-align" id="calltoaction-quemsomos"><span style="font-weight: bold;">Serviços </span> </li>
              </div>
      
            </div>
      
       
            <?php break; endforeach;
    

      //Component::render('old', 'Home');?>




                              <style>
@keyframes heartbeat {
    0% {
        transform: scale(0);
    }

    25% {
        transform: scale(1.2);
    }

    50% {
        transform: scale(1);
    }

    75% {
        transform: scale(1.2);
    }

    100% {
        transform: scale(1);
    }
}

.slider-container {
    position: relative;
    margin: 20px auto;
    padding: 20px;
    width: 70%;
    height: 90rem;
    background-color: yellow;
    border-radius: 20px;

}

@media (max-width:1200px) {
    .slider-container {
        width: 100%
    }
}

.slider-container .bullet-container {
    position: absolute;
    bottom: 114px;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    transform: translate(0px, 0px);
    justify-content: center;
}

.slider-container .bullet-container .bullet {
    height: 9rem;
    margin: 8px;
    padding: 9px;
    width: 9rem;
    border-radius: 20%;
    background-color: white;
    opacity: 0.7;
}


@media (max-width: 690px) {
    .slider-container .bullet-container .bullet {
        height: 4rem;
        margin: 8px;
        padding: 9px;
        width: 4rem;
    }


}

.slider-container .bullet-container .bullet:last-child {
    margin-right: 0px;
}

.slider-container .bullet-container .bullet.active {
    opacity: 1;
    border: 4px solid #009bf5;
    width: 12rem;
    height: 12rem;
}

.slider-container .slider-content {
    position: relative;
    left: 50%;
    top: 50%;

    display: flex;
    justify-content: center;
    width: 100%;

    height: 60%;
    transform: translate(-50%, -68%);
}

@media (max-width:585px) {
    .slider-container .slider-content {
        top: 49%;
    }
}

.slider-container .slider-content .slider-single {
    position: absolute;
    z-index: 0;

    top: 0;
    width: 54rem;
    height: 54rem;
    transition: z-index 0ms 250ms;
}

@media (max-width:1701px) {
    .slider-container .slider-content .slider-single {
        width: 47vw;
        height: 64rem;
    }
}



@media (max-width:1124px) {
    .slider-container .slider-content .slider-single {
        width: 65vw;
        height: 63rem;
    }
}




.slider-container .slider-content .slider-single .slider-single-image {
    position: relative;
    left: 0;
    top: 0;
    width: 100%;
    object-fit: cover;
    height: 51rem;
    box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.2);
    transition: 500ms cubic-bezier(0.17, 0.67, 0.55, 1.43);
    transform: scale(0);
    opacity: 0;
}

@media (max-width:994px) {
    .slider-container .slider-content .slider-single .slider-single-image {
        height: 80%
    }
}

.slider-container .slider-content .slider-single .slider-single-download {
    position: absolute;
    display: block;
    right: -22px;
    bottom: 12px;
    padding: 15px;
    color: black;
    background-color: #fdc84b;
    font-size: 18px;
    font-weight: 600;
    font-family: "karla";
    border-radius: 5px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    transition: 500ms cubic-bezier(0.17, 0.67, 0.55, 1.43);
    opacity: 0;
}

.slider-container .slider-content .slider-single .slider-single-download:hover,
.slider-container .slider-content .slider-single .slider-single-download:focus {
    outline: none;
    text-decoration: none;
}

.slider-container .slider-content .slider-single .slider-single-title {
    display: block;
    float: left;
    margin: 16px 0 0 20px;
    font-size: 20px;
    font-family: "karla";
    font-weight: 400;
    color: black;
    transition: 500ms cubic-bezier(0.17, 0.67, 0.55, 1.43);
    opacity: 0;
}

.slider-container .slider-content .slider-single .slider-single-likes {
    display: block;
    float: right;
    margin: 16px 20px 0 0;
    transition: 500ms cubic-bezier(0.17, 0.67, 0.55, 1.43);
    opacity: 0;
}

.slider-container .slider-content .slider-single .slider-single-likes i {
    font-size: 20px;
    display: inline-block;
    vertical-align: middle;
    margin-right: 5px;
    color: #ff6060;
    transition: 500ms cubic-bezier(0.17, 0.67, 0.55, 1.43);
    transform: scale(0);
}

.slider-container .slider-content .slider-single .slider-single-likes p {
    display: inline-block;
    vertical-align: middle;
    margin: 0;
    color: #ffffff;
}

.slider-container .slider-content .slider-single .slider-single-likes:hover,
.slider-container .slider-content .slider-single .slider-single-likes:focus {
    outline: none;
    text-decoration: none;
}

.slider-container .slider-content .slider-single.preactivede .slider-single-image {
    transform: translateX(-50%) scale(0);
}

.slider-container .slider-content .slider-single.preactive {
    z-index: 1;
}

.slider-container .slider-content .slider-single.preactive .slider-single-image {
    opacity: 0.3;
    transform: translateX(-25%) scale(0.8);
}

.slider-container .slider-content .slider-single.preactive .slider-single-download {
    transform: translateX(-150px);
}

.slider-container .slider-content .slider-single.preactive .slider-single-title {
    transform: translateX(-150px);
}

.slider-container .slider-content .slider-single.preactive .slider-single-likes {
    transform: translateX(-150px);
}

.slider-container .slider-content .slider-single.proactive {
    z-index: 1;
}

.slider-container .slider-content .slider-single.proactive .slider-single-image {
    opacity: 0.3;
    transform: translateX(25%) scale(0.8);
}

.slider-container .slider-content .slider-single.proactive .slider-single-download {
    transform: translateX(150px);
}

.slider-container .slider-content .slider-single.proactive .slider-single-title {
    transform: translateX(150px);
}

.slider-container .slider-content .slider-single.proactive .slider-single-likes {
    transform: translateX(150px);
}

.slider-container .slider-content .slider-single.proactivede .slider-single-image {
    transform: translateX(50%) scale(0);
}

.slider-container .slider-content .slider-single.active {
    z-index: 2;
}

.slider-container .slider-content .slider-single.active .slider-single-image {
    opacity: 1;
    transform: translateX(0%) scale(1);

    border-radius: 47px;
}

.slider-container .slider-content .slider-single.active .slider-single-download {
    opacity: 1;
    transition-delay: 100ms;
    transform: translateX(0px);
}

.slider-container .slider-content .slider-single.active .slider-single-title {
    opacity: 1;
    transition-delay: 200ms;
    transform: translateX(0px);
}

.slider-container .slider-content .slider-single.active .slider-single-likes {
    opacity: 1;
    transition-delay: 300ms;
    transform: translateX(0px);
}

.slider-container .slider-content .slider-single.active .slider-single-likes i {
    animation-name: heartbeat;
    animation-duration: 500ms;
    animation-delay: 900ms;
    animation-interation: 1;
    animation-fill-mode: forwards;
}

.slider-container .slider-left {
    position: absolute;
    z-index: 3;
    display: block;
    right: 85%;
    top: 50%;
    color: #ffffff;
    transform: translateY(-145%);
    padding: 20px 20px;
    border-radius: 20%;
    background: #009bf5;
    border-bottom: 2px solid #fdc84b;
    border-left: 2px solid #fdc84b;
    margin-left: -2px;
}

.slider-container .slider-right {
    position: absolute;
    z-index: 3;
    display: block;
    left: 85%;
    top: 50%;
    color: #ffffff;
    transform: translateY(-145%);
    padding: 20px 20px;
    border-radius: 20%;
    background: #009bf5;
    border-bottom: 2px solid #fdc84b;
    border-left: 2px solid #fdc84b;
    margin-left: -2px;
}

.slider-container .slider-right:hover {
    box-shadow: 0 0 20px cyan;
    border-left: 20px solid orange
}

.slider-container .slider-left:hover {
    box-shadow: 0 0 20px cyan;
    border-right: 20px solid orange
}

.slider-container .not-visible {
    display: none !important;
}

</style>



<div class="slider-container">

<div class="slider-content">



<?php 
    
    $slider_image = 0; 
    $slider = 1;

    foreach($data as $d): $image = $d->getImage();
                                          $description = utf8_encode($d->getDescription()) ?>

    <div class="slider-single slider-<?=$slider?>">
        <img class="slider-single-image"  id="slider-image-<?=$slider_image?>"  src="<?=$image?>" alt="<?=$slider?>" />
        <h1 class="slider-single-title"><?=$description?></h1>
        <a class="slider-single-likes" href="javascript:void(0);">
            <i class="fa fa-heart"></i>
            <p>1,247</p>
        </a>
    </div>
    <?php $slider++; $slider_image++;endforeach; ?>
   
</div>
</div>




<!--footer section-->

 <?php  Component::render('footer');
        //Layout::config('js'); ?>


<script>

                                                            
const repeat = false;
const noArrows = false;
const noBullets = false;


const container = document.querySelector('.slider-container');
var slide = document.querySelectorAll('.slider-single');
var slideTotal = slide.length - 1;
var slideCurrent = -1;

function initBullets() {
    if (noBullets) {
        return;
    }
    const bulletContainer = document.createElement('div');

    bulletContainer.classList.add('bullet-container')
    slide.forEach((elem, i) => {

        const bullet = document.createElement('div');
                              i_b = i

                
                                    
        element = document.querySelector(`#slider-image-${i_b}`);
        console.log(element)
        img = element.getAttribute("src")

        bullet.style.backgroundImage = `url(${img})`




        bullet.classList.add('bullet')
        bullet.id = `bullet-index-${i}`
        bullet.addEventListener('click', () => {
            goToIndexSlide(i);

        })
        bulletContainer.appendChild(bullet);
        elem.classList.add('proactivede');
    })
    container.appendChild(bulletContainer);
}

function initArrows() {
    if (noArrows) {
        return;
    }
    const leftArrow = document.createElement('a')
    const iLeft = document.createElement('i');
    iLeft.classList.add('fa')
    iLeft.classList.add('fa-arrow-left')
    leftArrow.classList.add('slider-left')
    leftArrow.appendChild(iLeft)
    leftArrow.addEventListener('click', () => {
        slideLeft();
    })
    const rightArrow = document.createElement('a')
    const iRight = document.createElement('i');
    iRight.classList.add('fa')
    iRight.classList.add('fa-arrow-right')
    rightArrow.classList.add('slider-right')
    rightArrow.appendChild(iRight)
    rightArrow.addEventListener('click', () => {
        slideRight();
    })
    container.appendChild(leftArrow);
    container.appendChild(rightArrow);
}

function slideInitial() {
    initBullets();
    initArrows();
    setTimeout(function () {
        slideRight();
    }, 500);
}

function updateBullet() {
    if (!noBullets) {
        document.querySelector('.bullet-container').querySelectorAll('.bullet').forEach((elem, i) => {
            elem.classList.remove('active');
            if (i === slideCurrent) {
                elem.classList.add('active');
            }
        })
    }
    checkRepeat();
}

function checkRepeat() {
    if (!repeat) {
        if (slideCurrent === slide.length - 1) {
            slide[0].classList.add('not-visible');
            slide[slide.length - 1].classList.remove('not-visible');
            if (!noArrows) {
                document.querySelector('.slider-right').classList.add('not-visible')
                document.querySelector('.slider-left').classList.remove('not-visible')
            }
        }
        else if (slideCurrent === 0) {
            slide[slide.length - 1].classList.add('not-visible');
            slide[0].classList.remove('not-visible');
            if (!noArrows) {
                document.querySelector('.slider-left').classList.add('not-visible')
                document.querySelector('.slider-right').classList.remove('not-visible')
            }
        } else {
            slide[slide.length - 1].classList.remove('not-visible');
            slide[0].classList.remove('not-visible');
            if (!noArrows) {
                document.querySelector('.slider-left').classList.remove('not-visible')
                document.querySelector('.slider-right').classList.remove('not-visible')
            }
        }
    }
}

function slideRight() {
    if (slideCurrent < slideTotal) {
        slideCurrent++;
    } else {
        slideCurrent = 0;
    }

    if (slideCurrent > 0) {
        var preactiveSlide = slide[slideCurrent - 1];
    } else {
        var preactiveSlide = slide[slideTotal];
    }
    var activeSlide = slide[slideCurrent];
    if (slideCurrent < slideTotal) {
        var proactiveSlide = slide[slideCurrent + 1];
    } else {
        var proactiveSlide = slide[0];

    }

    slide.forEach((elem) => {
        var thisSlide = elem;
        if (thisSlide.classList.contains('preactivede')) {
            thisSlide.classList.remove('preactivede');
            thisSlide.classList.remove('preactive');
            thisSlide.classList.remove('active');
            thisSlide.classList.remove('proactive');
            thisSlide.classList.add('proactivede');
        }
        if (thisSlide.classList.contains('preactive')) {
            thisSlide.classList.remove('preactive');
            thisSlide.classList.remove('active');
            thisSlide.classList.remove('proactive');
            thisSlide.classList.remove('proactivede');
            thisSlide.classList.add('preactivede');
        }
    });
    preactiveSlide.classList.remove('preactivede');
    preactiveSlide.classList.remove('active');
    preactiveSlide.classList.remove('proactive');
    preactiveSlide.classList.remove('proactivede');
    preactiveSlide.classList.add('preactive');

    activeSlide.classList.remove('preactivede');
    activeSlide.classList.remove('preactive');
    activeSlide.classList.remove('proactive');
    activeSlide.classList.remove('proactivede');
    activeSlide.classList.add('active');

    proactiveSlide.classList.remove('preactivede');
    proactiveSlide.classList.remove('preactive');
    proactiveSlide.classList.remove('active');
    proactiveSlide.classList.remove('proactivede');
    proactiveSlide.classList.add('proactive');

    updateBullet();
}

function slideLeft() {


    if (slideCurrent > 0) {
        slideCurrent--;
    } else {
        slideCurrent = slideTotal;
    }

    if (slideCurrent < slideTotal) {
        var proactiveSlide = slide[slideCurrent + 1];
    } else {
        var proactiveSlide = slide[0];
    }
    var activeSlide = slide[slideCurrent];
    if (slideCurrent > 0) {
        var preactiveSlide = slide[slideCurrent - 1];
    } else {
        var preactiveSlide = slide[slideTotal];
    }


    slide.forEach((elem) => {
        var thisSlide = elem;
        if (thisSlide.classList.contains('proactive')) {
            thisSlide.classList.remove('preactivede');
            thisSlide.classList.remove('preactive');
            thisSlide.classList.remove('active');
            thisSlide.classList.remove('proactive');
            thisSlide.classList.add('proactivede');
        }
        if (thisSlide.classList.contains('proactivede')) {
            thisSlide.classList.remove('preactive');
            thisSlide.classList.remove('active');
            thisSlide.classList.remove('proactive');
            thisSlide.classList.remove('proactivede');
            thisSlide.classList.add('preactivede');
        }
    });

    preactiveSlide.classList.remove('preactivede');
    preactiveSlide.classList.remove('active');
    preactiveSlide.classList.remove('proactive');
    preactiveSlide.classList.remove('proactivede');
    preactiveSlide.classList.add('preactive');

    activeSlide.classList.remove('preactivede');
    activeSlide.classList.remove('preactive');
    activeSlide.classList.remove('proactive');
    activeSlide.classList.remove('proactivede');
    activeSlide.classList.add('active');

    proactiveSlide.classList.remove('preactivede');
    proactiveSlide.classList.remove('preactive');
    proactiveSlide.classList.remove('active');
    proactiveSlide.classList.remove('proactivede');
    proactiveSlide.classList.add('proactive');

    updateBullet();
}

function goToIndexSlide(index) {
    const sliding = (slideCurrent > index) ? () => slideRight() : () => slideLeft();
    while (slideCurrent !== index) {
        sliding();
    }
}

slideInitial();
                                                        </script>
