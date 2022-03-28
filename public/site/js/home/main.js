$(document).ready(function () {


$('.prevent_default').click(function (event) {
    event.preventDefault();
});



});



$('.banners').owlCarousel({
    loop: true,

    margin: 10,

    nav: false,

    dots: false,

    responsive: {

        0: {

            items: 1

        },

        600: {

            items: 1

        },

        1000: {

            items: 1

        }

    },

    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,


})



$('.quartos').owlCarousel({

    loop: true,

    margin: 140,

    nav: false,

    dots: false,

    center:true,

    responsive: {

        0: {

            items: 1

        },

        600: {

            items: 1

        },

        1000: {

            items: 3

        }

    }

})



$('.lazer').owlCarousel({

    loop: true,

    margin: 140,

    nav: false,

    dots: false,

    center:true,

    responsive: {

        0: {

            items: 1

        },

        600: {

            items: 1

        },

        1000: {

            items: 3

        }

    }

})



$('.hotel').owlCarousel({

    loop: true,

    margin: 140,

    nav: false,

    dots: false,

    center:true,

    responsive: {

        0: {

            items: 1

        },

        600: {

            items: 1

        },

        1000: {

            items: 3

        }

    }

})



$('.passeios').owlCarousel({

    loop: true,

    margin: 140,

    nav: false,

    dots: false,

    center:true,

    responsive: {

        0: {

            items: 1

        },

        600: {

            items: 1

        },

        1000: {

            items: 3

        }

    }

})



$(document).ready(function () {

    $('.tabs').tabs();

});





$(document).ready(function () {

    $('.datepicker').datepicker({

        'format': 'dd/mm/yyyy',

        'i18n': {

            months: [

                'Janeiro',

                'Fevereiro',

                'Março',

                'Abril',

                'Maio',

                'Junho',

                'Julho',

                'Agosto',

                'Setembro',

                'Outubro',

                'Novembro',

                'Dezembro'

            ],

            monthsShort: [

                'Janeiro',

                'Fevereiro',

                'Março',

                'Abril',

                'Maio',

                'Junho',

                'Julho',

                'Agosto',

                'Setembro',

                'Outubro',

                'Novembro',

                'Dezembro'

            ],

            weekdays: [

                'Domingo',

                'Segunda',

                'Terça',

                'Quarta',

                'Quinta',

                'Sexta',

                'Sabado'

            ],

            weekdaysShort: [

                'Domingo',

                'Segunda',

                'Terça',

                'Quarta',

                'Quinta',

                'Sexta',

                'Sabado'

            ],

            weekdaysAbbrev:['D','S','T','Q','Q','S','S'],

            cancel: 'FECHAR',

        }

    });

});



