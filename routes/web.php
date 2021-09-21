<?php
Route::group(['middleware' => 'web', 'prefix' => config('flatlab.prefix')], function () {
    Route::auth();
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', function(){
            return view('flatlab::index');
        })->name('gestion.index');
    });
});

Route::group(['prefix' => 'plantilla'],function(){

    Route::get('/', function(){
        return view('home.index');
    });

    Route::prefix('eventos')->group(function(){
        Route::get('/', function(){
            return view('eventos.index');
        });

        Route::get('/show', function(){
            return view('eventos.show');
        });
        Route::get('/search', function(){
            return view('eventos.search');
        });
    });

    Route::prefix('actualidad')->group(function(){
        Route::get('/', function(){
            return view('actualidad.index');
        });

        Route::get('/show', function(){
            return view('actualidad.show');
        });
        Route::get('/search', function(){
            return view('actualidad.search');
        });
    });

    Route::prefix('recursos')->group(function(){
        Route::get('/', function(){
            return view('recursos.index');
        });

        Route::get('/discapacidad', function(){
            return view('recursos.discapacidad');
        });
        Route::get('/genero', function(){
            return view('recursos.genero');
        });
    });

    Route::prefix('experiencias')->group(function(){
        Route::get('/', function(){
            return view('experiencias.index');
        });
        Route::get('/historia_vida', function(){
            return view('experiencias.historia_vida.index');
        });

        Route::get('/historia_vida/show', function(){
            return view('experiencias.historia_vida.show');
        });
        Route::get('/historia_vida/search', function(){
            return view('experiencias.historia_vida.search');
        });
        Route::get('/practicas_inclusivas', function(){
            return view('experiencias.practicas_inclusivas.index');
        });
    });
});

/* Rutas Paginas */
Route::get('/{pagina?}', 'FrontendController@index');

