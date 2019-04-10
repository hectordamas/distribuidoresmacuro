@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 row">
        @forelse ($products as $product)
          <div class="card product">
            <a href="#">
              <img class="card-img-top" src="{{$product->image}}" alt="{{$product->name}}"/>
            </a>
            <div class="card-body d-flex justify-content-center">

              <table style="width:100%;">
                 <thead>
                      <tr>
                          <th colspan="2">
                          <h5 class="card-title text-center">{!!$product->name!!}</h5>
                          </th>
                      </tr>
                  </thead>
                <tbody style="font-size:13.2px;">
                  <tr>
                    <td><strong>Precio:</strong></td>
                    <td style="text-align:right;">{{number_format($product->price,2,",",".")}} $</td>
                  </tr>
                  <tr>
                    <td><strong>Disponibilidad:</strong></td>
                    <td style="text-align:right;">{{$product->stock}}</td>
                  </tr>
                  @if($product->stock > 0)
                  <tr>
                    <td colspan="2">
                      <div class="d-flex form-store" style="justify-content:center;">
                          <input type="number" min="0" class="form-control rounded-0 input-store" placeholder="Cantidad..."  id="input-qty{{$product->id}}"/>
                          <button class="btn btn-primary rounded-0" data-id="{{$product->id}}">Añadir</button>
                      </div>
                    </td>
                  </tr>
                  @else
                  <tr>
                    <td colspan="2">
                      <div class="d-flex form-store" style="justify-content:center;">
                          <input disabled type="text" class="form-control" placeholder="Producto en Tránsito"/>
                      </div>
                    </td>
                  </tr>
                  @endif
                </tbody>
              </table>
          </div><!--cardbody-->
        </div><!--card--->    
        @empty
        <div class="col-md-12 text-center" style="margin-top:10px;">
            <h2>No hay ningún producto en esta sección aún</h2>
        </div>
        @endforelse
      </div>

      <div class="col-md-4" style="background:indianred;">

      </div>

    </div>
</div>
@endsection