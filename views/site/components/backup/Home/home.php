<?php      require  __DIR__.DIRECTORY_SEPARATOR.'configuration'
                      .DIRECTORY_SEPARATOR.'Repositories'
                      .DIRECTORY_SEPARATOR.'Init.php'; ?>

<!DOCTYPE html>

<html lang="pt-br">



<head>

    <base href="<?= URL_BASE; ?>">

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Golden Beach</title>

    <?php require "configuration/HTML/Css.php"; ?>

<style>

#demo {position:relative; display:flex; flex-direction: column;}
#fade-atualizar {
            display: <?php if(isset($_SESSION['reservas_persist']) && $_SESSION['reservas_persist'] == true): ?> flex <?php else: ?> none <?php endif; ?>;
    position: fixed;
    top: 0;
    height: 100vh;
    padding-top: 40px;
    justify-content: center;
    width: 100%;
    height: 100vw;
    z-index: 99999;
    background: rgba(0, 0, 0, 0.7);
        }

        #ctnModal-atualizar {
            width: 83%;
            height: 71%;
            top: 0;
            display: flex;
            flex-direction: column;
            background: white;
            border-radius: 50px;
            border: 4px solid cyan;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }

        #fecharModal-atualizar {
            display: flex;
            justify-content: flex-end;

        }

        #close-atualizar {
    cursor: pointer;
    display: none;
}

        #tituloModal-atualizar {
            display: flex;
    justify-content: flex-end;
    padding: 7px;
    color: white !important;
    background-color: #00d5ff;
    font-size: 43px;
    font-weight: bold;
    border-radius: 50px 50px 0px 0px;
}

    #exitmodal-button {
        background-color: #0095f7;
    width: 55px;
    border-radius: 20px;
    height: 55px;
    margin:10px;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    #exitmodal-button:hover {
        background-color: white;
    width: 35px;
    border-radius: 20px;
    height: 35px;
    margin: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    #exitmodal-button a {
   
        color: white !important;
    }

    #exitmodal-button a:hover {
        transform: rotate(180deg);
        color: #00d5ff !important;
    }
</style>

</head>



<body>

<div class="home">

    <?php      Component::render('TopBar');
                    Component::render('Menu');
      ?>



    <section class="banner">

        <article class="owl-carousel owl-theme banners">

            <figure class="item">

                <img src="public/site/img/home/banner.png" style="width:100%" alt="Golden Beach Park Hotel">

            </figure>

        </article>



        <h1>APARTAMENTOS COM VARANDA E VISTA PARA O MAR EM UMA LOCAIZAÇÃO PRIVILEGIADA!</h1>

    </section>

    <?php $CheckIn = isset($_GET['checkin']) ? $_GET['checkin'] : '';   
                $CheckOut = isset($_GET['checkout']) ? $_GET['checkout'] : '';
                $ad = isset($_GET['adultos']) ? $_GET['adultos'] : '';
                $NRooms = isset($_GET['quartos']) ? $_GET['quartos'] : '';

    
    
    
    $CheckInIframe = str_replace("/", "", $CheckIn); ?>
	<?php $CheckOutIframe = str_replace("/", "", $CheckOut); ?>

	<?php if(!empty($CheckIn) && !empty($CheckOut) && !empty($ad) && !empty($NRooms)){
		$urlbusca = "&NRooms=".$NRooms."&ad=".$ad."&CheckIn=".$CheckInIframe."&CheckOut=".$CheckOutIframe."";
        $URL = "https://reservations.omnibees.com/default.aspx?q=1331".$urlbusca; 
        $_SESSION['reservas_persist'] = true;
	}else{
        $_SESSION['reservas_persist'] = false;
		$urlbusca = "";
        $URL = "";
	} ?>

<?php
                        if(isset($_GET)): ?>
<div id="fade-atualizar">
                    <div id="ctnModal-atualizar">

                        <span id="fecharModal-atualizar">
                            <div id="close-atualizar" class="fa fa-close"></div>
                        </span>
                        <div id="tituloModal-atualizar"><span id="exitmodal-button"><a href="home">X</a></div></span>
                        <?php
            
                            if( 
                            empty($_GET['quartos'])
                            or empty($_GET['adultos'])
                            or empty($_GET['checkin'])
                            or empty($_GET['checkout'])
                            ): ?>  <h1  style="text-align: center; font-size:2rem;">  <?php echo "Coloque direito seus dados. Só será mostrado a área de reserva." ; ?> </h1>
                            
                            
                            
                            <div id="demo">
                            <iframe style="width: 100%;
    height: 100vw;
    position: absolute;" src="https://reservations.omnibees.com/default.aspx?q=1331<?php echo $urlbusca; ?>"></iframe>
                        </div>

                            
                            
                            <?php else:     ?>

                        <div id="demo">
                            <iframe style="width: 100%;
    height: 100vw;
    position: absolute;" src="https://reservations.omnibees.com/default.aspx?q=1331<?php echo $urlbusca; ?>"></iframe> <?php endif; ?>
                        </div>


                    </div>
                </div>
	
                <?php endif; ?>


    <section class="reserva">

        <h2>que tal realizar uma reserva?</h2>

        <form action="home/reservas">

            <label for="">

                Precisa de quantos

                quartos?

                <input type="text" name="quartos" id="reservas_quarto">

            </label>

            <label for="">

                Quantos adultos?

                <input type="text" name="adultos"  id="reservas_adultos">

            </label>

            <label for="">

                Quando será o Check-in?

                <input type="date" name="checkin"   id="reservas_checkin">

            </label>

            <label for="">

                E o Check-out?

                <input type="date" name="checkout"  id="reservas_checkout">

            </label>



            <button onclick="reservas()" class="btnSubmit">verificar disponibilidade</button>



        </form>

    </section>





    <section class="diferenciais">

        <h2>conheça nossos diferenciais</h2>


<?php foreach($diferenciais as $dif):
    $title = $dif->getTitle();
    $image = $dif->getImage(); 
    $i = 0;
    if($i <= 4):?>
        <article>

            <figure>

                <img src="<?=$image?>" alt="">

            </figure>

            <h5><?=$title ?></h5>

        </article>
        
<?php
$i++;
continue;
else: break;

endif;
endforeach; ?>

    </section>



    <section class="dicas">

        <div>

            <h2>veja nossas dicas de passeios!</h2>

        </div>


<?php $i_c = 0; ?>

<?php foreach($ceara as $c): 

    if($i_c <=  1):
                $ceara_title = $c->getTitle();
                $ceara_image = $c->getImage();
       ?>
    

        <article>

            <figure>

                <img src="<?=$ceara_image?>" alt="">

            </figure>

            <h5><?=$ceara_title ?></h5>

        </article>
                    
        <?php $i_c++;
                    else:

                        break;
                    endif;
    endforeach;  ?>


        

<?php $i_f = 0; ?>
<?php foreach($fortaleza as $f): 
            if($i_f <=  2):
                $title = $f->getTitle();
                $image = $f->getImage();
                
       ?>
    


   
        <article>

            <figure>

                <img src="<?=$image?>" alt="">

            </figure>

            <h5><?=$title ?></h5>

        </article>
                    
        <?php $i_f++;
        else:
            break;
            
    endif;
    endforeach;  ?>

    </section>



    <section class="maravilhas">

        <h2>CONFIRA AS MARAVILHAS RESERVADAS PARA VOCÊ!</h2>

        <div class="row">

            <div class="col s12">

                <ul class="tabs">
              
                    <li class="tab col s3"><a href="#quartos">Quartos</a></li>

                    <li class="tab col s3"><a href="#lazer">Lazer</a></li>

                    <li class="tab col s3"><a href="#hotel">Hotel</a></li>

                    <li class="tab col s3"><a href="#passeios">Passeios</a></li>

                </ul>

            </div>

        </div>



        <article class="owl-theme owl-carousel quartos" id="quartos">
        <?php foreach($quartos as $q):
                        $image_quartos = $q->getImage(); ?>
             
            <figure class="item">

                <img src="<?=$image_quartos?>" alt="">

            </figure>

      <?php  endforeach;?>
        </article>



        <article class="owl-theme owl-carousel lazer" id="lazer">

        <?php foreach($lazer as $l):
                        $image_lazer = $l->getImage(); ?>
             
            <figure class="item">

                <img src="<?=$image_lazer?>" alt="">

            </figure>

      <?php  endforeach;?>
       

        </article>



        <article class="owl-theme owl-carousel hotel" id="hotel">

          
        <?php foreach($hotel as $h):
                        $image_hotel = $h->getImage(); ?>
             
            <figure class="item">

                <img src="<?=$image_hotel?>" alt="">

            </figure>

      <?php  endforeach;?>
        </article>



        <article class="owl-theme owl-carousel passeios" id="passeios">

        <?php foreach($passeios as $p):
                        $image_passeios = $p->getImage(); ?>
            
            <figure class="item">

                <img src="<?=$image_passeios?>" alt="">

            </figure>

      <?php  endforeach;?>

        </article>





    </section>



    <section class="depoimentos">


        <h2>QUEM VISITOU, AMOU! CONFIRA NOSSOS DEPOIMENTOS!</h2>





        <?php foreach($depoimentos as $d): 
        $name =$d->getName();
        $depoimento = $d->getDepoimento(); ?>

        <article>

            <h6><?=$depoimento?></h6>

            <p><?=$name?></p>

            <img src="public/site/img/home/aspas.webp" alt="" class="esquerda">

            <img src="public/site/img/home/aspas.webp" alt="" class="direita">

        </article>
        <?php   endforeach;?>
    

    </section>







    <section class="pets">

        <article>

            <h2>Somos pet friendly!</h2>

            <h4>Aqui toda a sua família é muito bem recebida, incluindo os amiguinhos de quatro patas, pêlos e bigodes!</h4>

            <figure>

                <img src="public/site/img/home/pets.webp" alt="Um cachorro e um gato">

            </figure>

            <img src="public/site/img/home/patas.png" class="esquerda">

            <img src="public/site/img/home/patas.png" class="direita">

        </article>

    </section>



    <section class="contato">

        <figure>

            <img src="public/site/img/home/casal.webp" alt="Imagem de um casal com roupa de verão, malas e segurando uma passagem aerea">

        </figure>

        <article>

            <h2>entre em contato conosco!</h2>

            <h3>respondemos rapidinho!</h3>

            <form method="POST" action="contact/persist" enctype="multipart/form-data">

                <label for="#" class="metade">

                    <input type="text" name="name" placeholder="Seu nome">

                </label>

                <label for="#" class="metade">

                    <input type="text" name="tel" placeholder="Seu número de Telefone">

                </label>

                <label for="#">

                    <input type="email" name="email" placeholder="E-mail">

                </label>

                <label for="#">

                    <input type="text" name="msg" placeholder="Como podemos te ajudar? :)">

                </label>

                <button type="submit">enviar mensagem</button>

            </form>

        </article>

    </section>



    <?php require "footer.php" ?>

    </div>



    <script>

  
let open = document.querySelectorAll('.openModal-atualizar');
console.log(open);

document.getElementById("btnSubmit").addEventListener("click", function(event){
  event.preventDefault()
});

let close = document.getElementById('close-atualizar');
let fade = document.getElementById('fade-atualizar');
let cntModal = document.getElementById('ctnModal-atualizar');
let input = document.querySelectorAll(".id_value_global");
const URL_BASE = "<?php echo URL_BASE ?>";



    var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                  if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("demo").innerHTML =
                                    this.responseText;
                                  }
                                };
                                xhttp.open("GET", 'https://reservations.omnibees.com/default.aspx?q=1331<?php echo $urlbusca; ?> ', true);
                                xhttp.send();
                    
                
                                fade.style.display = "flex";
 



close.onclick = function() {fade.style.display = "none"}

fade.onclick = function() {fade.style.display = "none"}

cntModal.onclick = function(event) {event.stopPropagation()}

        </script>
</body>



</html>