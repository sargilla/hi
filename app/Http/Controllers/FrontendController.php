<?php

namespace App\Http\Controllers;

use Sigma\Paginas\Pagina;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
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
   
}
