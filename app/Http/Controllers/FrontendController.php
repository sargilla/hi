<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests;
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
        $noticias = [];
        $paginas = [];
        $eventos =[];
        // $productos = Producto::where('nombre', 'like', "%".request()->busqueda."%")->orWhere('descripcion', 'like', "%".$busqueda."%")->orWhere('codigo', 'like', "%".$busqueda."%");
        // $marcas = $productos->pluck('marca')->filter()->unique()->sort();
        // $etiquetas = config('productos.tags') ? Tag::deLosProductos($productos->pluck('id'))->get() : $productos->pluck('etiqueta')->filter()->unique()->sort();
        // // dd($productos->publicados()->get());
        // $productos = $productos->publicados()->filtrar($filtro);
        // if(config('productos.pagination')){
        //     $productos = $productos->paginate(config('productos.pagination_per_page'));
        // } else {
        //     $productos = $productos->get();
        // }

        return view('buscar', compact('noticias','paginas','eventos'));
    }
}
