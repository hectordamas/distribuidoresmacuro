@extends('layouts.app')
@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col-md-4">
      @include('admin.sidebar')
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-header" style="font-family:'Source Sans Pro', sans-serif;">
          Crear un Producto
        </div>
        <div class="card-body">
          <form action="/products" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="form-group col-md-4">
                <input placeholder="Nombre del Producto" type="text" name="name" id="name" class="form-control">
              </div>
              <div class="form-group col-md-4">
                <select class="form-control" name="operation">
                  <option value="">Selecciona una Operación</option>
                  <option value="Importar">Importar</option>
                  <option value="Producto En Stock">Producto En Stock</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <select class="form-control" name="category">
                  <option value="">Selecciona una Categoría</option>
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
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <textarea class="form-control" name="details" rows="8" cols="80" placeholder="Descripción | Detalles del producto">
                </textarea>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-4">
                <input placeholder="SKU" type="number" name="sku" id="sku" class="form-control">
              </div>
              <div class="form-group col-md-4">
                <input placeholder="Precio" type="number" name="price" id="price" class="form-control">
              </div>
              <div class="form-group col-md-4">
                <input placeholder="Disponibilidad" type="number" name="stock" id="stock" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <input placeholder="Medida para Cliente" type="number" name="measure" id="measure" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <input placeholder="Medida para Container (metros cuadrados)" type="number" name="measure2" id="measure2" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <input type="submit" class="btn btn-primary" value="Enviar">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
