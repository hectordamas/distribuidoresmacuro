<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Distribuidores Macuro</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @include('alerts.spinner')
        @include('alerts.cart.edit')
        @include('alerts.50percent')
        @include('alerts.stock')
        @include('alerts.cartMessage')
        @if(isset($typeOperation))
            @if($typeOperation == 'Importar')
                @include('alerts.100percent')            
            @endif
        @endif
        <nav class="navbar navbar-expand-lg navbar-light navbar-laravel sticky-top">
            <div class="container">
                <a class="navbar-brand" href="/home">
                  <img src="/img/LOGOTIPO-MACURO.png" alt="" width="150px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Ingresa</a>
                            </li>
                        @else

                            @if(Auth::user()->rol == "admin")
                              <li class="nav-item">
                                <a href="/products/create" class="nav-link">Administrar</a>
                              </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a href="/operation/Stock" class="nav-link">Inventario</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/operation/Stock/category/Neumaticos">
                                        Neumáticos para Carros
                                    </a>
                                    <a class="dropdown-item" href="/operation/Stock/category/Neumaticos-para-Gandola">
                                        Neumáticos para Gandola
                                    </a>
                                    <a class="dropdown-item" href="/operation/Stock/category/Neumaticos-para-Moto">
                                        Neumáticos para Moto
                                    </a>
                                    <a class="dropdown-item" href="/operation/Stock/category/Bateria">
                                        Batería
                                    </a>
                                    <a class="dropdown-item" href="/operation/Stock/category/Filtro">
                                        Filtro
                                    </a>
                                    <a class="dropdown-item" href="/operation/Stock/category/Camara-de-Aire">
                                        Cámara de Aire
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="/operation/Importar" class="nav-link">Importar</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/operation/Importar/category/Neumaticos">
                                        Neumáticos para Carros
                                    </a>
                                    <a class="dropdown-item" href="/operation/Importar/category/Neumaticos-para-Gandola">
                                        Neumáticos para Gandola
                                    </a>
                                    <a class="dropdown-item" href="/operation/Importar/category/Neumaticos-para-Moto">
                                        Neumáticos para Moto
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                      Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="/cart" class="nav-link">
                                    <span class="badge badge-danger count" id="count-bar">{{Cart::getTotalQuantity()}}</span>
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
