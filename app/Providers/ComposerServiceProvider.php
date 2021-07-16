<?php

namespace App\Providers;

use App\Pagina;
use App\Asociado;
use App\Suscripcion;
use Sargilla\Productos\Moneda;
use App\Composers\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Sargilla\FlatLab\Services\ViewComposers\ActiveLinkComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('plantilla::_header', MenuComposer::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
