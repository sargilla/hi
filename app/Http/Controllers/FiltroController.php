<?php
namespace App\Http\Controllers;

use Sigma\Paginas\Pagina;
use Sigma\Noticias\Noticia;
use Sigma\Eventos\Evento;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use Sargilla\Toastr\Facades\Toastr;

class FiltroController extends Controller
{
     public function search()
     {
         if(request()->busqueda == "actualidad" ||request()->busqueda == "experiencias")
         {
            if(!isset(request()->fecha) && !isset(request()->pais) && !isset(request()->tematica))
            {            
                   $busqueda = Noticia::delTema(request()->busqueda)->get();          
            } else 
            {
                if(isset(request()->fecha))
                {
                    $busqueda = Noticia::where('fecha_desde',request()->fecha);   
                }
                if(isset(request()->pais))
                {
                    $busqueda = Noticia::where('pais',request()->pais);  
                }
                if(isset(request()->tematica))
                {
                    $busqueda = Noticia::where('tema_id',request()->tematica);  
                }
                $busqueda = $busqueda->get();
            }
         }
         if(request()->busqueda == "eventos")
         {      
                if(isset(request()->fecha))
                {
                    $busqueda = Evento::where('fecha_desde',request()->fecha);   
                }
                if(isset(request()->pais))
                {
                    $busqueda = Evento::where('pais',request()->pais);  
                }
                if(isset(request()->tematica))
                {
                    $busqueda = Evento::where('tipo_id',request()->tematica);  
                }
                $busqueda = $busqueda->get();
         }
         return view(request()->busqueda.'.search', compact('busqueda'));
     }
}
