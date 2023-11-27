(function($) {



    $('.menu-opener').click(function() {

        $('header').toggleClass('menu-active');

    });



    $('#mobile-menu li a').click(function() {

        $('header').removeClass('menu-active');

    });



    $(window).scroll(function() {

        if ($(window).scrollTop() > 80) {

            $('#page').addClass('scrolled');

        } else {

            $('#page').removeClass('scrolled');

        }

    });



    $('.equipo-wrapper').slick({

        dots: false,

        infinite: false,

        arrows: true,

        slidesToShow: 1,

        slidesToScroll: 1,

        autoplay: false,

        autoplaySpeed: 4000,

        responsive: [

            {

                breakpoint: 9999,

                settings: "unslick"

            },

            {

                breakpoint: 1180,

                 settings: {

                    slidesToShow: 3,

                    slidesToScroll: 3,

                    arrows: false,

                    dots: true,

                    swipeToSlide: true,

                }

            },

            {

                breakpoint: 768,

                 settings: {

                    slidesToShow: 1,

                    slidesToScroll: 1,

                    arrows: false,

                    dots: true,

                    swipeToSlide: true,

                }

            }

        ]

    });

    

    $('.mision-vision-blocks').slick({

        dots: false,

        infinite: false,

        arrows: true,

        slidesToShow: 1,

        slidesToScroll: 1,

        autoplay: false,

        autoplaySpeed: 4000,

        responsive: [

            {

                breakpoint: 9999,

                settings: "unslick"

            },

            {

                breakpoint: 980,

                 settings: {

                    slidesToShow: 1,

                    slidesToScroll: 1,

                    arrows: false,

                    dots: true,

                    swipeToSlide: true,

                }

            }

        ]

    });

    

    var waypoints = $('.triangle-section').waypoint(function(direction) {

        if ($('.triangle-section').hasClass('inactive')) {
            if ($(window).width() > 1180) {
                $('.triangle-section').removeClass('inactive');

                $('.tooltip-block').toggleClass('active');

                setTimeout(() => {
                    $('.tooltip-block').toggleClass('active');
                }, "1200");
            }
        }
    }, {
        offset: '60%'
    });



    function mobileSlide(item) {
        if ( item.hasClass('desarrollo-part') ) {
            if (!$('.desarrollo-block').hasClass('active')) {
                $('.desarrollo-block').slideDown( "slow", function() {});
                $('.desarrollo-block').addClass('active');
                $('.tooltip-block:not(.desarrollo-block)').removeClass('active');
            } else {
                $('.tooltip-block').removeClass('active');
            }
        }

        if ( item.hasClass('sociedad-part') ) {
            if (!$('.sociedad-block').hasClass('active')) {
                $('.sociedad-block').slideDown( "slow", function() {});
                $('.sociedad-block').addClass('active');
                $('.tooltip-block:not(.sociedad-block)').removeClass('active');
            } else {
                $('.tooltip-block').removeClass('active');
            }
        }

        if ( item.hasClass('ciencia-part') ) {
            if (!$('.ciencia-block').hasClass('active')) {
                $('.ciencia-block').slideDown( "slow", function() {});
                $('.ciencia-block').addClass('active');
                $('.tooltip-block:not(.ciencia-block)').removeClass('active');
            } else {
                $('.tooltip-block').removeClass('active');
            }
        }
    }

    $(window).click(function() {
        if ($(window).width() <= 1180) {
            $( ".tooltip-block.active" ).slideUp( "slow", function() {});
            $('.tooltip-block').removeClass('active');
        } else {
            $('.tooltip-block').removeClass('active');
        }
    });

    if ($(window).width() <= 1180) {


        $('.tooltip-opener').click(function(event) {

            event.stopPropagation();

            var item = $(this);
            if ($( ".tooltip-block.active" ).length > 0) {
                $( ".tooltip-block.active" ).slideToggle( "slow", function() {
                    mobileSlide(item)
                });
            } else {
                mobileSlide(item)
            }

        });
    } else {

        $('.general-opener').hover(function(event) {
            event.stopPropagation();

            $('.tooltip-block').toggleClass('active');
        });

$('.tooltip-opener').hover(function(event) {
    event.stopPropagation();

    if ($(this).hasClass('desarrollo-part')) {
        $('.desarrollo-block').toggleClass('active');
        
        if ($('.desarrollo-block').hasClass('active')) {
            // Cuando se agrega la clase "active" a desarrollo-block, cambiar el valor de fill-opacity a 0
            $('#desarrollo').attr('fill-opacity', '0');
        } else {
            // Si se quita la clase "active", puedes restaurar el valor original si lo conoces
            $('#desarrollo').attr('fill-opacity', '0.07'); // Sustituye 'valor-original' por el valor real
        }

        $('.tooltip-block:not(.desarrollo-block)').removeClass('active');
    }

    if ($(this).hasClass('sociedad-part')) {
        $('.sociedad-block').toggleClass('active');
        
        if ($('.sociedad-block').hasClass('active')) {
            // Cuando se agrega la clase "active" a sociedad-block, cambiar el valor de fill-opacity a 0
            $('#sociedad').attr('fill-opacity', '0');
        } else {
            // Si se quita la clase "active", puedes restaurar el valor original si lo conoces
            $('#sociedad').attr('fill-opacity', '0.07'); // Sustituye 'valor-original' por el valor real
        }

        $('.tooltip-block:not(.sociedad-block)').removeClass('active');
    }

    if ($(this).hasClass('ciencia-part')) {
        $('.ciencia-block').toggleClass('active');
        
        if ($('.ciencia-block').hasClass('active')) {
            // Cuando se agrega la clase "active" a ciencia-block, cambiar el valor de fill-opacity a 0
            $('#ciencia').attr('fill-opacity', '0');
        } else {
            // Si se quita la clase "active", puedes restaurar el valor original si lo conoces
            $('#ciencia').attr('fill-opacity', '0.07'); // Sustituye 'valor-original' por el valor real
        }

        $('.tooltip-block:not(.ciencia-block)').removeClass('active');
    }
});

    }

    



    $( ".equipo-btn" ).on( "click", function() {


        if ($(this).text() == 'Ver todos') {
            $(this).text('Ver menos')

        } else if ($(this).text() == 'Ver menos') {
            $(".icono-ampliar-hidden").css({'opacity': '0', 'transition': 'opacity 0.3s ease'});
            $(this).text('Ver todos')
        } else if ($(this).text() == 'See all') {
            $(this).text('See less')
        } else {
            $(this).text('See all')

        }

		$( ".hidden-wrapper" ).slideToggle( "slow", function() {
          // Animation complete.
          
		if($(this).css('display') === 'block'){
			$(".icono-ampliar-hidden").css('opacity', '1');
		}
        });
    });



    

    function preventAnchorScroll() {



        var scrollToTop = function() {
            $(window).scrollTop(0);
        };

        if (window.location.hash) {

            // handler is executed at most once
            $(window).one('scroll', scrollToTop);

            var hash = window.location.hash;

            if ($(hash).length) {
                $('html, body').animate({
                    scrollTop: $(hash).offset().top - 120
                }, 600, 'swing');
            }
        }

        // make sure to release scroll 1 second after document readiness
        // to avoid negative UX
        $(function() {
            setTimeout(
                function() {
                    $(window).off('scroll', scrollToTop);
                },
                1000
            );
        });
    }


    preventAnchorScroll();



    $('.hashed a, a.hashed').click(function(e) {

        var url = $(this).attr('href');
        var hash = url.substring(url.indexOf('#')); // '#foo'
        $('header').removeClass('menu-active');


        if ($(hash).length) {

            $('html, body').animate({

                scrollTop: $(hash).offset().top - 120

            }, 600, 'swing');

        }

    });
	
$(document).ready(function () {
    // Agregar la clase "active" al hacer clic en enlaces de menú y al div "plusminus"
    $('.nav-menu .menu-item-has-children > a').click(function (e) {
        e.preventDefault();
        var $parentItem = $(this).parent();
        var $divPlusMinus = $(this).find('.plusminus');
        
        if ($parentItem.hasClass('active')) {
            $parentItem.removeClass('active');
            $divPlusMinus.removeClass('active');
            $(this).removeClass('active'); // Agregar o quitar la clase "active" al elemento <a>
        } else {
            // Quitar la clase "active" de otros elementos
            $('.nav-menu .menu-item-has-children').removeClass('active');
            $('.nav-menu .menu-item-has-children .plusminus').removeClass('active');
            $('.nav-menu .menu-item-has-children > a').removeClass('active'); // Agregar o quitar la clase "active" al elemento <a>

            // Agregar la clase "active" al elemento actual
            $parentItem.addClass('active');
            $divPlusMinus.addClass('active');
            $(this).addClass('active'); // Agregar o quitar la clase "active" al elemento <a>
        }
    });

    // Eliminar la clase "active" al hacer clic en cualquier lugar del documento, excepto dentro del encabezado
$(document).click(function (e) {
    if (
        !$(e.target).closest('header').length &&
        !$(e.target).closest('.nav-menu').length &&
        !$(e.target).closest('.sub-menu').length
    ) {
        $('.nav-menu .menu-item-has-children').removeClass('active');
        $('.nav-menu .menu-item-has-children .plusminus').removeClass('active');
        $('.nav-menu .menu-item-has-children > a').removeClass('active');
    }
});
});
	    $(document).ready(function() {
        
        $('.blog-post-content a').attr('target', '_blank');
    });


jQuery(document).ready(function($) {
  // Seleccionar todos los elementos li con la clase "menu-item-has-children"
  $('.menu-item-has-children').each(function() {
    // Encontrar el primer elemento <a> dentro de este <li>
    var anchor = $(this).find('a:first');
    
    // Crear el div con la clase "plusminus"
    var div = $('<div>').addClass('plusminus');
    
    // Insertar el div dentro del elemento <a>
    anchor.append(div);
  });
});
	
	
	
document.addEventListener('DOMContentLoaded', function(){
	
const modalButtons = document.querySelectorAll('.button-modal-show');
const modals = document.querySelectorAll('.modal');
	
	modalButtons.forEach((button, index) => {
		button.addEventListener('click', () => {
			if(modals[index]){
                document.body.classList.add('modal-open');
				modals[index].classList.add('modal-show')
			}
		});
	});
const closeModalButtons = document.querySelectorAll('.modal-close');
	
    closeModalButtons.forEach((button, index) => {
	button.addEventListener('click', () =>{
		if(modals[index]){
                document.body.classList.remove('modal-open');
				modals[index].classList.remove('modal-show');
			}
		});
	});


});

$(document).ready(function() {
        var hash = window.location.hash;
        if (hash) {
        scrollToAnchor(hash);
        }
    });


})(jQuery);