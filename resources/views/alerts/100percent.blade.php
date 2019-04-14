@if($fillPercent >= 97)
<div class="complete-container">
        <div class="complete text-center">
            <i class="fas fa-truck" style="font-size:50px; color:white;"></i>
            <br>
            <br>
            <h1 style="color:white">
                    Acabas de llenar más de un contenedor completo, por favor confirma el Pedido
            </h1>
            <div class="w-100 d-flex justify-content-center">
                <a href="/cart" class="btn btn-primary" style="margin-left:10px;">Confirmar Pedido</a>
            </div>
        </div>
</div>
@endif
<div class="complete2-container">
        <div class="complete2 text-center">
            <i class="fas fa-truck" style="font-size:50px; color:white;"></i>
            <br>
            <br>
            <h1 style="color:white">
                Acabas de llenar más de un contenedor, por favor confirma el Pedido
            </h1>
            <div class="w-100 d-flex justify-content-center">
                <a href="/cart" class="btn btn-primary" style="margin-left:10px;">Confirmar Pedido</a>
            </div>
        </div>
</div>