<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">{{ config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarsExample04">
        {{ $menu }}
        <form class="form-inline mr-lg-auto mr-xl-3 my-2  col-sm-8 col-md-6 mx-auto col-lg-2 p-lg-0 mx-lg-0  my-lg-0">
            <input class="form-control w-100" type="text" placeholder="Search">
        </form>
        @if (config('clientes.instalado'))
            <div class="row justify-content-center align-items-center px-2 ">
                @guest('clientes')
                    <span class="mx-1">
                        <a class="nav-link" href="{{route('clientes.login')}}">
                        <i class="fas fa-user text-white"></i>
                        </a>
                    </span>
                @endguest
                @auth('clientes')
                    <span class="mx-1">
                        <a class="nav-link" href="{{route('clientes.mi-cuenta')}}">
                            <i class="fas fa-user text-white"></i>
                        </a>
                    </span>
                    <span class="mx-1">
                        <a class="nav-link" href="#" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt text-white"></i>
                        </a>
                        <form id="logout-form" action="{{ route('clientes.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </span>
                @endauth
                <top-cart />
            </div>
        @endif
    </div>
  </nav>
