<?php
namespace App\Composers;

use Spatie\Menu\Link;
use Illuminate\View\View;
use Spatie\Menu\Laravel\Menu;
use Sargilla\Productos\Categoria;
use Sigma\Flatlab\FlatlabMenu;
use Illuminate\Support\Facades\Route;

class MenuComposer
{
    private $patron;
    private $menu;
    private $menus;

    public function __construct()
    {
        $this->menu_salida = Menu::new();
        $this->menu_salida->addClass('navbar-nav mr-auto');
        $this->menus = FlatLabMenu::raiz()->menu('frontend')->ordenar()->get();
        $this->patron = request()->url();
    }
    public function compose(View $view)
    {
        $this->buildMenu();
        $this->menu_salida->setActive($this->patron);
        $this->menu_salida->each(function (Link $link) {
            $link->addClass('nav-link')->addParentClass('nav-item');
            if($link->isActive()){
                $link->addClass('active');
            };
        });
        // dd($this->menu_salida);
        $view->with('menu', $this->menu_salida);
    }
    public function buildMenu()
    {
        foreach ($this->menus as $menu) {
            switch ($menu->tipo) {
                case 'items_categorias':
                    $categorias = Categoria::base()->publicadas()->orderBy('orden', 'asc')->get();
                    $this->generarHijosCategorias($categorias,$this->menu_salida);
                break;
                default:
                if ($menu->tieneHijos()) {
                    $this->hijos = $menu->hijos->sortBy('orden');
                    $this->menu_salida->submenuIfCan(
                        $menu->permiso,
                        Link::to('#', $menu->nombre)
                        ->addClass('nav-link dropdown-toggle')
                        ->setAttributes(['data-toggle' => 'dropdown', 'role' => 'button']),
                        // "<a href='#'><div>$menu->nombre</div></a>",
                        function (Menu $menu_parcial) {
                            $menu_parcial->addParentClass('nav-item dropdown');
                            $menu_parcial->addClass('dropdown-menu');
                            $this->generarHijos($this->hijos, $menu_parcial);
                        }
                    );
                } else {
                    $this->generarLink($menu, $this->menu_salida);
                };
                break;
            }

        }
        // dd($this->menu_salida->render());
    }
    public function generarHijos($hijos, $menu)
    {
        foreach($hijos as $hijo)
        {
            $this->hijos = $hijo->hijos();
            if($this->hijos->count()){
                $menu->submenuIfCan(
                    $hijo->permiso,
                    Link::to('#', $hijo->nombre)
                        ->addClass('dropdown-item dropdown-toggle')
                        ->setAttributes(['data-toggle' => 'dropdown', 'role' => 'button'])
                    ,
                    function (Menu $menu)
                    {
                        $menu->addClass('dropdown-menu');
                        $this->generarHijos($this->hijos, $menu);
                    }
                );
            } else {
                $this->generarLink($hijo, $menu);
            }
        }
        $menu->setActiveFromRequest();
    }
    public function generarHijosCategorias($categorias, $menu)
    {
        $categorias->map(function($categoria) use ($menu){
            $hijos = $categoria->hijos()->publicadas()->get();
            if($hijos->count()){
                $menu->submenu(
                    Link::to('#', $categoria->titulo)
                        ->addClass('dropdown-item dropdown-toggle')
                        ->setAttributes(['data-toggle' => 'dropdown', 'role' => 'button']),
                    function (Menu $menu) use ($hijos){
                        $menu->addClass('dropdown-menu');
                        $this->generarHijosCategorias($hijos, $menu);
                    }
            );
            } else {
                $menu->add(Link::to(route('categorias',$categoria), $categoria->titulo)->addClass('dropdown-item'));
            }
        });
    }
    /**
     * Genera el link de menu
     */
    public function generarLink($menuItem, $menu = null)
    {
        if(!$menu){
            $menu = $this->menu_salida  ;
        }
        switch ($menuItem->tipo) {
            case 'url':
                $menu->addIfCan(
                    $menuItem->permiso,
                    Link::to(url("$menuItem->destino"),$menuItem->nombre)->addClass('dropdown-item')
                );
                break;
            case 'route':

                if( Route::has($menuItem->destino) ){

                    $menu->addIfCan(
                        $menuItem->permiso,
                        Link::to(route($menuItem->destino),$menuItem->nombre)->addClass('dropdown-item'),
                        $menuItem->nombre);
                }
                break;
            case 'action':
                $menu->actionIfCan($menuItem->permiso, $menuItem->destino,$menuItem->nombre);
                break;
            case 'categoria':
                if ($menuItem->destino != 'base'){
                    $categorias = Categoria::whereSlug($menuItem->destino)->get();
                    $this->generarHijosCategorias($categorias, $menu);
                } else {
                    $categorias = Categoria::base()->publicadas()->get();

                    $menu->submenuIfCan($menuItem->permiso,
                        Link::to('#',$menuItem->nombre)
                            ->addClass('nav-link dropdown-toggle')
                            ->setAttributes(['data-toggle' => 'dropdown', 'role' => 'button']),
                          function (Menu $parcial) use ($categorias) {
                            $parcial->addParentClass('nav-item dropdown');
                            $parcial->addClass('dropdown-menu');
                            $this->generarHijosCategorias($categorias, $parcial);
                        }
                    );
                }
                break;
        }

    }
}
