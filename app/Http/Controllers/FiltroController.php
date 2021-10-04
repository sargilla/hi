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
                $busqueda = '';
                if(isset(request()->fecha))
                {
                    $busqueda = Noticia::where('fecha_desde',request()->fecha);   
                }
                if(isset(request()->pais))
                {
                    if($busqueda != '')
                    {
                        $busqueda->where('pais',request()->pais);  
                    }else{
                        $busqueda = Noticia::where('pais',request()->pais);   
                    }
                    
                }
                if(isset(request()->tematica))
                {
                    if($busqueda != '')
                    {
                        $busqueda->where('tema_id',request()->tematica);  
                    }else{
                        $busqueda = Noticia::where('tema_id',request()->tematica);   
                    }
                }
                $busqueda = $busqueda->get();
            }
         }
         if(request()->busqueda == "eventos")
         {      
                $busqueda = '';
                if(isset(request()->fecha))
                {
                    $busqueda = Evento::where('fecha_desde',request()->fecha);   
                }
                if(isset(request()->pais))
                {
                    if($busqueda != '')
                    {
                        $busqueda->where('pais',request()->pais);  
                    } else 
                    {
                        $busqueda = Evento::where('pais',request()->pais);  
                    }           
                }
                if(isset(request()->tematica))
                {
                    if($busqueda != '')
                    {
                        $busqueda->where('tipo_id',request()->tematica); 
                    }else 
                    {
                        $busqueda = Evento::where('tipo_id',request()->tematica); 
                    }
                     
                }
                $busqueda = $busqueda->get();
         }
         return view(request()->busqueda.'.search', compact('busqueda'));
     }
}
