$(document).ready(function(){
    $('#boton-menu').click(function(){
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
    $('body').keyup(function(event){
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
    
    $('#btn-letra').click(function(){
        
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
            $('h3').addClass('fs-3x');
        }
    })
    $(window).on('resize',function(){
       let zoom = Math.round(window.devicePixelRatio * 100)
        
       if(zoom >=200)
       {
       
        $('#navbarsExample04').addClass('rounded-10');
        $('#navbarsExample04').addClass('mx-auto');
        $('#navbarsExample04 input').addClass('w-100');
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
                    $('#navbarsExample04').removeClass('menu-top-300');
                    $('#navbarsExample04').removeClass('scale-300');
                }
                $('#boton-menu').addClass('pd-200');
                $('#navbarsExample04').addClass('menu-top-200');
                $('#navbarsExample04').addClass('scale-200');
               
             
            } 
        if(zoom >=300 && zoom <400)
            {
                if($('#boton-menu').hasClass('pd-200'))
                {
                    $('#boton-menu').removeClass('pd-200');
                    $('#navbarsExample04').removeClass('menu-top-200');
                    $('#navbarsExample04').removeClass('scale-200');
                } 
                if($('#boton-menu').hasClass('pd-400'))
                {
                    $('#boton-menu').removeClass('pd-400');
                    $('#navbarsExample04').removeClass('menu-top-400');
                    $('#navbarsExample04').removeClass('scale-400');  
                } 
                $('#boton-menu').addClass('pd-300');
                $('#navbarsExample04').addClass('menu-top-300');
                $('#navbarsExample04').addClass('scale-300'); 
                
            }
        if(zoom >=400 && zoom< 500)
            {
                if($('#boton-menu').hasClass('pd-300'))
                {
                    $('#boton-menu').removeClass('pd-300');
                    $('#navbarsExample04').removeClass('menu-top-300');
                    $('#navbarsExample04').removeClass('scale-300');
                }
                if($('#boton-menu').hasClass('pd-500'))
                {
                    $('#boton-menu').removeClass('pd-500');
                    $('#navbarsExample04').removeClass('menu-top-500');
                    $('#navbarsExample04').removeClass('scale-500');
                }
                $('#boton-menu').addClass('pd-400');
                $('#navbarsExample04').addClass('menu-top-400');
                $('#navbarsExample04').addClass('scale-400');  
            }
            if( zoom >= 500)
            {
                if($('#boton-menu').hasClass('pd-400'))
                {
                    $('#boton-menu').removeClass('pd-400');
                    $('#navbarsExample04').removeClass('menu-top-400');
                    $('#navbarsExample04').removeClass('scale-400');
                }
                $('#boton-menu').addClass('pd-500');
                $('#navbarsExample04').addClass('menu-top-500');
                $('#navbarsExample04').addClass('scale-500');  
            }                
        }else 
        {
            $('#navbarsExample04').removeClass('rounded-10');
            $('#navbarsExample04').removeClass('mx-auto');
            $('#navbarsExample04 input').removeClass('w-100');
            $('.nav-link').removeClass('menu-200');
            $('.nav-item').removeClass('menu-200');
            $('#boton-menu').removeClass('menu-200');             
            $('#boton-menu i').removeClass('menu-200');        
            $('#boton-menu span').removeClass('menu-200'); 
            $('#boton-menu').removeClass('pd-200');
            $('#navbarsExample04').removeClass('menu-top-200');
            $('#navbarsExample04').removeClass('scale-200');
        }
        
    })
})

