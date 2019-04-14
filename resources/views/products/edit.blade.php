@extends('layouts.app')
@section('content')
<div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="/products/create">Administrar</a></li>
                              <li class="breadcrumb-item"><a href="/products">Productos</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Editar</li>
                            </ol>
                        </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Editar
                        </div>
                        <div class="card-body">
                            <form action="/products/{{$product->id}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Nombre</label>
                                    <input value="{{$product->name}}" placeholder="Nombre del Producto" type="text" name="name" id="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                            <label for="">Operacion</label>
                                      <select class="form-control" name="operation">
                                        <option value="{{$product->operation}}">{{$product->operation}}</option>                                        
                                        <option value="Importar">Importar</option>
                                        <option value="Stock">Producto En Stock</option>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                            <label for="">Categoria</label>
                                      <select class="form-control" name="category">
                                        <option value="{{$product->category}}">{{$product->category}}</option>                                        
                                        <option value="Neumáticos">Neumáticos</option>
                                        <option value="Batería">Batería</option>
                                        <option value="Filtro">Filtro</option>
                                        <option value="Cámara de Aire">Cámara de Aire</option>
                                      </select>
                                    </div>
                                </div>
                              <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="image">Selecciona una imagen para tu Producto</label>
                                    <input type="file" value="{{$product->image}}" class="form-control" name="image" id="image" accept="image/*">
                                  <img src="{{$product->image}}" width="60px" alt="{{$product->name}}">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-12">
                                <label for="">Descripción</label>
                                <textarea class="form-control" name="details" rows="8" cols="80" placeholder="Descripción | Detalles del producto">{!!$product->details!!}
                                </textarea>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-4">
                                <label for="">SKU</label>
                                <input value="{{$product->sku}}" placeholder="SKU" type="number" name="sku" id="sku" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="">Precio</label>
                                  <input value="{{$product->price}}" placeholder="Precio" type="number" name="price" id="price" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                        <label for="">Stock</label>
                                  <input value="{{$product->stock}}" placeholder="Disponibilidad" type="number" name="stock" id="stock" class="form-control">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6">
                                        <label for="">Medida interna</label>
                                  <input value="{{$product->measure}}" placeholder="Medida para Cliente" type="number" name="measure" id="measure" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                        <label for="">Medida para el cliente</label>
                                  <input value="{{$product->measure2}}" placeholder="Medida para Container (metros cuadrados)" type="number" name="measure2" id="measure2" class="form-control">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col">
                                  <input type="submit" class="btn btn-primary" value="Editar">
                                </div>
                              </div>
                            </form>
                        </div>
                    </div>
        
                </div>
            </div>
</div>
@endsection