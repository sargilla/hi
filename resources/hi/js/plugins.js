$(function() {
    $('a.scroll[href^="#"]').on("click",function(e) {
        e.preventDefault();
    	$(window).stop(true).scrollTo(this.hash, {duration:1000, interrupt:true});
    });


    $('.dropdown-menu a.dropdown-toggle').on( 'click', function (e) {
        var $el = $( this );
        $el.toggleClass('active-dropdown');
        var $parent = $( this ).offsetParent( ".dropdown-menu" );
        if ( !$( this ).next().hasClass( 'show' ) ) {
            $( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
        }
        var $subMenu = $( this ).next( ".dropdown-menu" );
        $subMenu.toggleClass( 'show' );

        $( this ).parent( "li" ).toggleClass( 'show' );

        $( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function ( e ) {
            $( '.dropdown-menu .show' ).removeClass( "show" );
            $el.removeClass('active-dropdown');
        } );

         if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
            $el.next().css( { "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 } );
        }

        return false;
    } );

    document.getElementById('buscador').onblur = ()=>{
        document.getElementById('boton-menu').focus();
    }

    $('#boton-menu').on('click', function(){
        $('.navbar').toggleClass('bg-primary');
        $(this).toggleClass('text-white');
        $(this).toggleClass('text-primary');
        $(this).toggleClass('mt-3');
        $('.navbar-toggler-icon').toggleClass('d-none');
        $('.fa-times').toggleClass('d-none');

        if(Math.round(window.devicePixelRatio * 100)>=200)
        {
            if( $('#boton-menu').hasClass('mt-3'))
            {
              $('#boton-menu').removeClass('mt-3');
            }
        }
    })

    $('body').on('keyup',function(event){
       if(event.key == 'Tab')
       {
           if(event.target.getAttribute('id') == "buscador")
           {
               $('#div-search').addClass('outline')
           } else
           {
            $('#div-search').removeClass('outline')
           }
       }
    })

    if(Cookies.get('fs-3x'))
    {
        $("body").addClass('fs-3x');
        $("body").addClass('fs-3x');
        $('a').addClass('fs-3x');
        $('h2').addClass('fs-3x');
        $('h3').addClass('fs-3x');
        $('h1').addClass('fs-8x');
        $('p').addClass('fs-3x');
    }

    if(Cookies.get('oscuro'))
    {
        $("body").addClass('bg-dark');
    }

    $('#btn-oscuro').click(function(){

        if(!$('body').hasClass('bg-dark'))
        {
            $("body").addClass('bg-dark');
            Cookies.set('oscuro', true, {expires:30});
        }else
        {
            if(Cookies.get('oscuro'))
            {
                Cookies.remove('oscuro');
            }
            $("body").removeClass('bg-dark');
        }
    })

    $('#btn-letra').on('click',function(){

        if(!$('body').hasClass('fs-3x'))
        {
            $("body").addClass('fs-3x');
            $('a').addClass('fs-3x');
            $('h2').addClass('fs-3x');
            $('h3').addClass('fs-3x');
            $('h1').addClass('fs-8x');
            $('p').addClass('fs-3x');
            Cookies.set('fs-3x', true, {expires:30});
        }else
        {
            if(Cookies.get('fs-3x'))
            {
                Cookies.remove('fs-3x');
            }
            $("body").removeClass('fs-3x');
            $('a').removeClass('fs-3x');
            $('h2').removeClass('fs-3x');
            $('h1').removeClass('fs-8x ');
            $('p').removeClass('fs-3x');
            $('h3').removeClass('fs-3x');
        }
    })


    $(window).on('resize',function(){

        let zoom = Math.round(window.devicePixelRatio * 100)
        let width =  window.screen.width
        if(zoom >=200 && width > 450)
        {

            $('#menuhi').addClass('rounded-10');
            $('#menuhi').addClass('mx-auto');
            $('#menuhi input').addClass('w-100');
            $('.nav-link').addClass('menu-200');
            $('.nav-item').addClass('menu-200');
            $('#boton-menu').addClass('menu-200');
            $('#boton-menu i').addClass('menu-200');
            $('#boton-menu span').addClass('menu-200');

            if( zoom<300)
                {
                    if($('#boton-menu').hasClass('pd-300'))
                    {
                        $('#boton-menu').removeClass('pd-300');
                        $('#menuhi').removeClass('menu-top-300');
                        $('#menuhi').removeClass('scale-300');
                    }
                    $('#boton-menu').addClass('pd-200');
                    $('#menuhi').addClass('menu-top-200');
                    $('#menuhi').addClass('scale-200');


                }
            if(zoom >=300 && zoom <400)
                {
                    if($('#boton-menu').hasClass('pd-200'))
                    {
                        $('#boton-menu').removeClass('pd-200');
                        $('#menuhi').removeClass('menu-top-200');
                        $('#menuhi').removeClass('scale-200');
                    }
                    if($('#boton-menu').hasClass('pd-400'))
                    {
                        $('#boton-menu').removeClass('pd-400');
                        $('#menuhi').removeClass('menu-top-400');
                        $('#menuhi').removeClass('scale-400');
                    }
                    $('#boton-menu').addClass('pd-300');
                    $('#menuhi').addClass('menu-top-300');
                    $('#menuhi').addClass('scale-300');

                }
            if(zoom >=400 && zoom< 500)
                {
                    if($('#boton-menu').hasClass('pd-300'))
                    {
                        $('#boton-menu').removeClass('pd-300');
                        $('#menuhi').removeClass('menu-top-300');
                        $('#menuhi').removeClass('scale-300');
                    }
                    if($('#boton-menu').hasClass('pd-500'))
                    {
                        $('#boton-menu').removeClass('pd-500');
                        $('#menuhi').removeClass('menu-top-500');
                        $('#menuhi').removeClass('scale-500');
                    }
                    $('#boton-menu').addClass('pd-400');
                    $('#menuhi').addClass('menu-top-400');
                    $('#menuhi').addClass('scale-400');
                }
                if( zoom >= 500)
                {
                    if($('#boton-menu').hasClass('pd-400'))
                    {
                        $('#boton-menu').removeClass('pd-400');
                        $('#menuhi').removeClass('menu-top-400');
                        $('#menuhi').removeClass('scale-400');
                    }
                    $('#boton-menu').addClass('pd-500');
                    $('#menuhi').addClass('menu-top-500');
                    $('#menuhi').addClass('scale-500');
                }
        }
        else  {
                $('#menuhi').removeClass('rounded-10');
                $('#menuhi').removeClass('mx-auto');
                $('#menuhi input').removeClass('w-100');
                $('.nav-link').removeClass('menu-200');
                $('.nav-item').removeClass('menu-200');
                $('#boton-menu').removeClass('menu-200');
                $('#boton-menu i').removeClass('menu-200');
                $('#boton-menu span').removeClass('menu-200');
                $('#boton-menu').removeClass('pd-200');
                $('#menuhi').removeClass('menu-top-200');
                $('#menuhi').removeClass('scale-200');
        }

    });

    let zoom = Math.round(window.devicePixelRatio * 100)
    let width =  window.screen.width
        if(zoom >=200 && width > 450)
        {

            $('#menuhi').addClass('rounded-10');
            $('#menuhi').addClass('mx-auto');
            $('#menuhi input').addClass('w-100');
            $('.nav-link').addClass('menu-200');
            $('.nav-item').addClass('menu-200');
            $('#boton-menu').addClass('menu-200');
            $('#boton-menu i').addClass('menu-200');
            $('#boton-menu span').addClass('menu-200');

            if( zoom<300)
                {
                    if($('#boton-menu').hasClass('pd-300'))
                    {
                        $('#boton-menu').removeClass('pd-300');
                        $('#menuhi').removeClass('menu-top-300');
                        $('#menuhi').removeClass('scale-300');
                    }
                    $('#boton-menu').addClass('pd-200');
                    $('#menuhi').addClass('menu-top-200');
                    $('#menuhi').addClass('scale-200');


                }
            if(zoom >=300 && zoom <400)
                {
                    if($('#boton-menu').hasClass('pd-200'))
                    {
                        $('#boton-menu').removeClass('pd-200');
                        $('#menuhi').removeClass('menu-top-200');
                        $('#menuhi').removeClass('scale-200');
                    }
                    if($('#boton-menu').hasClass('pd-400'))
                    {
                        $('#boton-menu').removeClass('pd-400');
                        $('#menuhi').removeClass('menu-top-400');
                        $('#menuhi').removeClass('scale-400');
                    }
                    $('#boton-menu').addClass('pd-300');
                    $('#menuhi').addClass('menu-top-300');
                    $('#menuhi').addClass('scale-300');

                }
            if(zoom >=400 && zoom< 500)
                {
                    if($('#boton-menu').hasClass('pd-300'))
                    {
                        $('#boton-menu').removeClass('pd-300');
                        $('#menuhi').removeClass('menu-top-300');
                        $('#menuhi').removeClass('scale-300');
                    }
                    if($('#boton-menu').hasClass('pd-500'))
                    {
                        $('#boton-menu').removeClass('pd-500');
                        $('#menuhi').removeClass('menu-top-500');
                        $('#menuhi').removeClass('scale-500');
                    }
                    $('#boton-menu').addClass('pd-400');
                    $('#menuhi').addClass('menu-top-400');
                    $('#menuhi').addClass('scale-400');
                }
                if( zoom >= 500)
                {
                    if($('#boton-menu').hasClass('pd-400'))
                    {
                        $('#boton-menu').removeClass('pd-400');
                        $('#menuhi').removeClass('menu-top-400');
                        $('#menuhi').removeClass('scale-400');
                    }
                    $('#boton-menu').addClass('pd-500');
                    $('#menuhi').addClass('menu-top-500');
                    $('#menuhi').addClass('scale-500');
                }
        }
        else  {
                $('#menuhi').removeClass('rounded-10');
                $('#menuhi').removeClass('mx-auto');
                $('#menuhi input').removeClass('w-100');
                $('.nav-link').removeClass('menu-200');
                $('.nav-item').removeClass('menu-200');
                $('#boton-menu').removeClass('menu-200');
                $('#boton-menu i').removeClass('menu-200');
                $('#boton-menu span').removeClass('menu-200');
                $('#boton-menu').removeClass('pd-200');
                $('#menuhi').removeClass('menu-top-200');
                $('#menuhi').removeClass('scale-200');
        }
});
