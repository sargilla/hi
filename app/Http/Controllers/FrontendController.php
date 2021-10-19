<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests;
use Sigma\Eventos\Evento;
use Sigma\Paginas\Pagina;
use Sigma\Noticias\Noticia;
use Illuminate\Http\Request;
use App\Filtros\ProductosFiltrar;
use Sargilla\Toastr\Facades\Toastr;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index($pagina = 'inicio')
    {
        $pagina = Pagina::whereSlug($pagina)->firstOrFail();
        return view('paginas::paginas.pagina',compact('pagina'));
    }

    public function showNoticia(Noticia $noticia){
        $tema = $noticia->tema;
        return view('noticias::show', compact(['tema','noticia']));
    }

     public function buscar(){
        $busqueda = request()->busqueda;

        if(strlen($busqueda) < 3){
            Toastr::warning('Debe ingresar una búsqueda de al menos 3 caracteres')->push();
            return redirect('/');
        }

        $noticias = Noticia::where('titulo', 'like', "%" . $busqueda."%")->orWhere('contenido', 'like', "%" . $busqueda."%")->get();
        $paginas = Pagina::where('titulo', 'like', "%" . $busqueda."%")->orWhere('contenido', 'like', "%" . $busqueda."%")->get();
        $eventos = Evento::where('titulo', 'like', "%" . $busqueda."%")->orWhere('contenido', 'like', "%" . $busqueda."%")->get();

        return view('buscar', compact('noticias','paginas','eventos'));
    }
}
