@extends('layouts.app')

@section('content')
<div class="container-fluid">

  <div class="row">
    <div class="col-md-9">
      <br>
      <br>
        <div class="row d-flex justify-content-center">
            @forelse ($products as $product)
              <div class="card product rounded-0">
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
                    <tbody style="font-size:15px;">
                      <tr>
                        <td><strong>Precio:</strong></td>
                        <td style="text-align:right;">{{number_format($product->price,2,".",",")}} $</td>
                      </tr>
                  @if($product->operation == 'Stock')
                      <tr>
                        <td><strong>Disponibilidad:</strong></td>
                        <td style="text-align:right;"><span id="stock{{$product->id}}">{{$product->stock}}</span></td>
                      </tr>
                      @if($product->stock > 0)
                      <tr>
                        <td colspan="2">
                          <div class="d-flex form-store" style="justify-content:center;">
                              <input type="number" min="0" class="form-control rounded-0 input-store" placeholder="Cantidad..."  id="input-qty{{$product->id}}"/>
                              <button class="btn btn-primary añadir rounded-0" data-id="{{$product->id}}">
                                  <i class="fas fa-plus"></i> Añadir                      
                              </button>
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
                    @else
                    <tr>
                      <td colspan="2">
                        <div class="d-flex form-store" style="justify-content:center;">
                            <input type="number" min="0" class="form-control rounded-0 input-store" placeholder="Cantidad..."  id="input-qty{{$product->id}}"/>
                            <button class="btn btn-primary añadir rounded-0" data-id="{{$product->id}}">
                                <i class="fas fa-plus"></i> Añadir                      
                            </button>
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
    </div>

    <div class="col-md-3 cart-bar">
      @if($typeOperation == 'Importar')
        @include('operations.cart.import')
      @else
        @include('operations.cart.stock')
      @endif
    </div>

  </div>
</div>
@endsection