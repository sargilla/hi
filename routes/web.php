<?php
Route::group(['middleware' => 'web', 'prefix' => config('flatlab.prefix')], function () {
    Route::auth();
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', function(){
            return view('flatlab::index');
        })->name('gestion.index'); 
    });
});

/* Rutas Paginas */
Route::get('/{pagina?}', 'FrontendController@index');
