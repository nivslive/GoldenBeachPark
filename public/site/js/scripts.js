  $(document).ready(function () {


    $(".button-collapse").sideNav();
    $('.parallax').parallax();
    var telaAlt = ($(window).height()) + 64;
    $('.home').css('height', telaAlt);
    $('.ancora').click(function () {
      var alvo = $(this).attr('href').split('#').pop();
      $('html, body').animate({
        scrollTop: $('#' + alvo).offset().top
      }, 1000);
      return false;
    });



    $("#imgBandeira").click(function(){
      if($(this).attr("src") == "https://upload.wikimedia.org/wikipedia/commons/0/03/Flag_of_Italy.svg") 
        $(this).attr("src","https://upload.wikimedia.org/wikipedia/commons/0/05/Flag_of_Brazil.svg");
      else
        $(this).attr("src","https://upload.wikimedia.org/wikipedia/commons/0/03/Flag_of_Italy.svg");
  
    });



  });



