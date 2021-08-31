$(document).ready(function(){
    $('#boton-menu').click(function(){
        $('.navbar').toggleClass('bg-primary');
        $(this).toggleClass('text-white');
        $(this).toggleClass('text-primary');
        $(this).toggleClass('mt-3');
        $('.navbar-toggler-icon').toggleClass('d-none');
        $('.fa-times').toggleClass('d-none');
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
    
})

