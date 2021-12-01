<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests;
use Sigma\Noticias\Tema;
use Sigma\Eventos\Evento;
use Sigma\Paginas\Pagina;
use Sigma\Noticias\Noticia;
use Illuminate\Http\Request;
use Sargilla\Toastr\Facades\Toastr;

class FiltroController extends Controller
{
     public function search()
     {

         if(request()->busqueda == "eventos")
         {
                $busqueda = '';

                if(isset(request()->fecha))
                {
                    $inicio = Carbon::createFromFormat('Y', request()->fecha)->startOfYear();
                    $fin =  Carbon::createFromFormat('Y', request()->fecha)->endOfYear();
                    $busqueda = Evento::whereBetween('fecha_desde',[$inicio,$fin]);
                }
                if(isset(request()->pais))
                {
                    if($busqueda != '')
                    {
                        $busqueda->where('pais','like','%'.request()->pais.'%');
                    } else
                    {
                        $busqueda = Evento::where('pais','like','%'.request()->pais.'%');
                    }
                }

                $busqueda = $busqueda->get();
                $fecha = request()->fecha;
                $pais = request()->pais;
                return view('filtro_eventos', compact('busqueda','fecha','pais'));

         } else {
            if(!isset(request()->fecha) && !isset(request()->pais))
            {
                $busqueda = Noticia::delTema(request()->busqueda)->get();
            } else
            {

                $busqueda = Noticia::delTema(request()->busqueda);
                if(isset(request()->fecha))
                {
                    $inicio = Carbon::createFromFormat('Y', request()->fecha)->startOfYear();
                    $fin =  Carbon::createFromFormat('Y', request()->fecha)->endOfYear();
                    $busqueda = $busqueda->whereBetween('created_at',[$inicio,$fin]);
                }
                if(isset(request()->pais))
                {
                    $busqueda->where('pais',request()->pais);
                }
                $busqueda = $busqueda->get();
            }
            $fecha = request()->fecha;
            $tema = Tema::whereSlug(request()->busqueda)->first();
            $pais = request()->pais;
            return view('filtro', compact('busqueda','fecha','tema','pais'));
         }

     }


}
