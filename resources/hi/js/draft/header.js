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
})

