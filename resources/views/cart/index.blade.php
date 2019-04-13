@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row mt-5">
            @if(session()->has('message'))
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            </div>
            @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Pedido
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>SKU</th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="6">
                                            <h5>
                                                <strong>
                                                    Pedido para Importar:
                                                </strong>
                                            </h5>
                                        </td>
                                    </tr>
                                    @forelse ($products as $product)
                                        @if ($product->attributes['operation'] == 'Importar')
                                        <tr>
                                            <td>{{$product->name}}</td>
                                            <td>{{ number_format($product->attributes['price'], 2, '.', ',') }} $</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->attributes['sku']}}</td>
                                            <td class="text-center">
                                                <form action="/cart/{{$product->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="delete btn btn-danger rounded-0">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="edit btn btn-primary rounded-0" data-id="{{$product->id}}">
                                                    Editar
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
                                    @empty
                                    <tr>
                                        <td colspan="6">
                                            No has agregado ningún producto
                                        </td>
                                    </tr>
                                    @endforelse
                                    <!--Pedido del inventario--->
                                    <tr>
                                        <td colspan="6">
                                            <h5>
                                                <strong>
                                                    Pedido de nuestro inventario:
                                                </strong>
                                            </h5>
                                        </td>
                                    </tr>
                                    @forelse ($products as $product)
                                        @if ($product->attributes['operation'] == 'Stock')
                                        <tr>
                                            <td>{{$product->name}}</td>
                                            <td>{{ number_format($product->attributes['price'], 2, '.', ',') }} $</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->attributes['sku']}}</td>
                                            <td class="text-center">
                                                <form action="/cart/{{$product->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="delete btn btn-danger rounded-0">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="edit btn btn-primary rounded-0" data-id="{{$product->id}}">
                                                    Editar
                                                </a>
                                             </td>
                                        </tr>
                                        @endif
                                    @empty
                                    <tr>
                                        <td colspan="6">
                                            No has agregado ningún producto
                                        </td>
                                    </tr>
                                    @endforelse
                                    <tr>
                                        <td>
                                            Total:
                                        </td>
                                        <td>
                                            {{ number_format($totalImport + $totalStock, 2, '.', ',') }} $
                                        </td>
                                        <td>
                                            {{$quantity}}
                                        </td>
                                        <td colspan="3">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @if(Cart::getContent()->count() > 0)
                                <form action="">
                                    @csrf
                                    <input type="submit" class="btn btn-primary" value="Enviar Pedido">
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection