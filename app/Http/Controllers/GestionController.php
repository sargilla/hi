<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Sigma\Paginas\Mensaje;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Spatie\Analytics\Analytics;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class GestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {

        $visitasxmes = Analytics::performQuery(Period::days(30), 'ga:sessions')->totalsForAllResults['ga:sessions'];
        // $visitasxmes = 150;

        $mensajes = Mensaje::take(5)->latest()->get();
        // $usuarios_activos = 1;
        $usuarios_activos = Analytics::getAnalyticsService()->data_realtime->get('ga:' . env('ANALYTICS_VIEW_ID'), 'rt:activeVisitors')->totalsForAllResults['rt:activeVisitors'];

        return view('gestion.index', compact('mensajes', 'visitasxmes', 'usuarios_activos'));
    }

    public function visitas()
    {
        $visitas = Analytics::fetchTotalVisitorsAndPageViews(Period::days(10));
        $datos = $visitas->map(function ($visita) {
            $visita['date'] = $visita['date']->format('d/m');
            return $visita;
        });
        return [
            'labels' => $datos->pluck('date'),
            'values' => [
                $datos->pluck('visitors'),
                $datos->pluck('pageViews')
            ],
            'nombres' => ['Visitas', 'Páginas Vistas']
        ];
    }


}
