@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/products/create">Administrar</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Ver Productos</li>
                    </ol>
                </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Productos
                </div>
                <div class="card-body">
                        <table class="table table-bordered table-striped DataTable">
                                <thead>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Categoría</th>
                                    <th>Detalle</th>
                                    <th>SKU</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Medida Interna</th>
                                    <th>Medida Cliente</th>
                                    <th>Última Modificación</th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td> {{$product->id}} </td>
                                            <td> {{$product->name}} </td>
                                            <td> {{$product->operation}} </td>
                                            <td> {{$product->category}} </td>
                                            <td> {!!$product->details!!} </td>
                                            <td> {{$product->sku}} </td>
                                            <td> {{number_format($product->price, 2, '.', ',')}} USD </td>
                                            <td> {{$product->stock}} </td>
                                            <td> {{$product->measure2}} metros cuadrados</td>
                                            <td> {{$product->measure}} </td>
                                            <td> {{ date_format($product->updated_at, 'd/m/Y') }} </td>
                                            <td>
                                            <form action="/products/{{$product->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                                </form>
                                            </td>
                                            <td>
                                                <a href="/products/{{$product->id}}/edit" class="btn btn-primary">Modificar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection