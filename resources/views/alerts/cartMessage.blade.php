@if(session()->has('cartMessage'))
<div class="cartMessage-container">
    <div class="cartMessage" style="color:white; ">
        <h2 class="text-center">{{session()->get('cartMessage')}}</h2>
    </div>
    <div class="button">
        <a href="/" class="btn btn-primary" style="font-size:17px;">Volver a Comprar</a>
    </div>
</div>
@endif