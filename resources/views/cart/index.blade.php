@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row mt-5">
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
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{ number_format($product->attributes['price'], 2, ',', '.') }} $</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->attributes['sku']}}</td>
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