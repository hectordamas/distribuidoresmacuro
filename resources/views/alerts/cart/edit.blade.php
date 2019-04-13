<div class="edit-container">
    <div class="card">
        <div class="card-header">
            Modicar Pedido
        </div>    
        <div class="card-body">
            <h2 class="card-text" id="edit-title">Hola</h2>
            <form id="edit-cart" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input class="form-control" type="number" min="1" name="quantity" id="quantity-edit">
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Modificar">
                        <a href="#" class="btn btn-danger" style="margin-left:10px;" id="cancel">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>