<div class="row d-flex justify-content-center">
        <span class="stock-count" style="font-size:70px; margin-right:10px;">{{$countStock}}</span> <i class="fas fa-shopping-cart" style="font-size:70px;"></i>
</div>
<div class="row" id="listCart">
@foreach ($items as $item)
    @if($item->attributes['operation'] == 'Stock')
    <div class="col-md-12 list-item">
        <strong>{{$item->name}}</strong> -  {{ number_format($item->price ,2,'.',',') }} $ - {{$item->quantity}}
    </div>
    @endif        
@endforeach
</div>
<div class="row" style="font-size:20px;">
    <div class="col-md-6">
       <strong>Total:</strong>
    </div>
    <div class="col-md-6">
        <span class="badge badge-dark" id="totalStock">{{number_format($totalStock,2,'.', ',')}} $</span>
    </div>
</div>
<div class="row">
    @include('component.confirmAndClear')
</div>