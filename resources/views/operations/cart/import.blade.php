<div class="row d-flex justify-content-center align-items-center">
    <span class="truck-count" style="font-size:70px; margin-right:10px;">{{$countImport}}</span> <i class="fas fa-truck-moving" style="font-size:70px;"></i>
</div>
<div class="row">
    <div class="col-md-12">
        <h5>
            Capacidad del contenedor:
        </h5>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
            <div class="progress">
                <div class="progress-bar bg-success" id="bar" role="progressbar" style="width: {{$fillPercent}}%" aria-valuenow="{{$fillPercent}}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h5 class="span-fillPercent">
            {{$fillPercent}} %
        </h5>
    </div>
</div>
<div class="row" id="listCart">
@foreach ($items as $item)
    @if($item->attributes['operation'] == 'Importar')
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
        <span class="badge badge-dark" id="totalImport">{{number_format($totalImport,2,'.', ',')}} $</span>
    </div>
</div>