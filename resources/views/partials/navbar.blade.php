<body>
    <div class="container-fluid">
        <nav class="d-flex navbar navbar-expand-lg navbar-dark __nave">
                <div class="d-flex flex-grow-1">
                    <span class="w-100 d-lg-none d-block"><!-- hidden spacer to center brand on mobile --></span>
                    <div class="navbar-brand" href="#">
                        <img class="__imglogo" src="/img/logo1.jpg" alt="logo">
                    </div>
                    
                    <div class="w-100 text-right">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar7">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </div>
      
                <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar7">
                    <ul class="navbar-nav ml-auto flex-nowrap __navbar">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item o_navitem">
                                    <a href="/proximosEstrenos" class="nav-link">Próximos Estrenos</a>
                                </li>
                                <li class="nav-item o_navitem">
                                    <a href="#" class="nav-link">Publicidad  Eventos</a>
                                </li>
                                <li class="nav-item o_navitem">
                                    <a href="#" class="nav-link">Contacto</a>
                                </li>
                                <li class="nav-item o_navitem">
                                  <a href="#" class="nav-link">Administrador</a>
                                </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item o_navitem">
                                <a href="/proximosEstrenos" class="nav-link">Próximos Estrenos</a>
                            </li>
                            <li class="nav-item o_navitem">
                                <a href="#" class="nav-link">Publicidad  Eventos</a>
                            </li>
                            <li class="nav-item o_navitem">
                                <a href="#" class="nav-link">Contacto</a>
                            </li>
                            <li class="nav-item o_navitem">
                              <a href="#" class="nav-link">Administrador</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>

                </div>
                <div class="d-flex __busqueda">
                        <form action="/buscar" method="get" class="d-flex form-inline">
                          <input class="form-control mr-sm-2" type="text" placeholder="Busca tu pelicula..." aria-label="Search" name="busqueda">
                          <button class="btn btn-dark my-2 my-sm-0 __buscar" type="submit">Buscar</button>
                        </form>
                </div>
              </nav>





              