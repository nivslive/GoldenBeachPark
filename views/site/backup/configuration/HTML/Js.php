
<!--import j-query before materialize-->

<!-- New Att -->
<script src="public/site/js/home/jquery-3.6.0.min.js"></script>
<!--Older Version -->
<!--<script type="text/javascript" src="public/site/js/jquery-3.2.1.min.js"></script>-->
<script type="text/javascript" src="public/site/js/materialize.min.js"></script>
<script type="text/javascript" src="public/site/js/materialize.js"></script>
<script type="text/javascript" src="public/site/js/scripts.js"></script>
<script type="text/javascript" src="public/site/js/estrutura.js"></script>


<!--initialize materialize interaction e.g modals-->
<script type="text/javascript">


let loading = document.querySelector("#carregando")
loading.style.display = "flex";
let content = document.querySelector("#conteudo")
content.style.display = "none";

window.onload = function(){
        //hide the preloader
        let item = document.querySelector("#carregando")
        let content = document.querySelector("#conteudo")

        item.style.opacity = "0";
        content.style.display = "initial";

    }


  $(document).ready(function(){

    $('.carousel.carousel-slider').carousel(
                {
                    fullWidth: true,
                    indicators: true
                }
            );

    $('.modal').modal();

  });



  function stopDefAction(evt) {
    evt.preventDefault();
}





  $(document).ready(function(){$(".button-collapse").sideNav();$('.parallax').parallax();var telaAlt=($(window).height())+64;$('.home').css('height',telaAlt);$('.ancora').click(function(){var alvo=$(this).attr('href').split('#').pop();$('html, body').animate({scrollTop:$('#'+alvo).offset().top},1000);return false;});});

</script>
  </body>
</html>
