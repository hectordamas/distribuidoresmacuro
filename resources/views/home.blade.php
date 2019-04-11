@extends('layouts.app')

@section('content')
<div class="jumbotron" id="HomeJumbotron">
    <div class="row d-flex justify-content-center" style="margin-top:25vh;">
        <div class="columnas">
            <a href="/operation/Importar">
                <div class="overlay-home">
                    <div class="subtitle-home row d-flex justify-content-center">
                       Importar
                    </div>
                    <div class="row d-flex justify-content-center">
                        <i class="fas fa-truck-moving icons-home"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="columnas">
            <a href="/operation/Stock">
                <div class="overlay-home">
                     <div class="subtitle-home row d-flex justify-content-center">
                         Ordenar Productos de Nuestro Inventario
                     </div>
                    <div class="row d-flex justify-content-center">
                        <i class="fas fa-shopping-cart icons-home"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
