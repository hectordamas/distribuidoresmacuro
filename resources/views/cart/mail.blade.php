<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <table border="1" cellpadding="10">
        <thead>
          <tr>
            <th>Nombre de la Empresa:</th>
            <th>Teléfono Fijo:</th>
            <th>Persona de Contacto:</th>
            <th>Teléfono Celular:</th>
            <th>Email:</th>
            <th>Ciudad:</th>
            <th>RIF</th>
          </tr>
          </thead>
          <tbody>
            <tr>
                <td>{!!$user->company!!}</td>
                <td>{!!$user->telephone!!}</td>
                <td>{!!$user->name!!}</td>
                <td>{!!$user->cellphone!!}</td>
                <td>{!!$user->email!!}</td>
                <td>{!!$user->city!!}</td>
                <td>{!!$user->rif!!}</td>
            </tr>
          </tbody>
      </table>
<br>
    <table border="1" cellpadding="10">
            <thead>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>SKU</th>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6">
                        <h5>
                            <strong>
                                Pedido para Importar:
                            </strong>
                        </h5>
                    </td>
                </tr>
                @foreach($products as $product)
                @if ($product->attributes['operation'] == 'Importar')
                <tr>
                    <td> {{$product->name}} </td>
                    <td> {{number_format($product->attributes['price'], 2, '.', ',')}} $</td>
                    <td> {{$product->quantity}} </td>
                    <td> {{$product->attributes['sku']}} </td>
                </tr>
                @endif
                @endforeach
                <tr>
                    <td colspan="6">
                        <h5>
                            <strong>
                                Pedido de Inventario:
                            </strong>
                        </h5>
                    </td>
                </tr>
                @foreach($products as $product)
                @if ($product->attributes['operation'] == 'Stock')
                <tr>
                    <td> {{$product->name}} </td>
                    <td> {{number_format($product->attributes['price'], 2, '.', ',')}} $</td>
                    <td> {{$product->quantity}} </td>
                    <td> {{$product->attributes['sku']}} </td>
                </tr>
                @endif
                @endforeach
                <tr>
                    <td>
                        Total:
                    </td>
                    <td>
                        {{ number_format($totalImport + $totalStock, 2, '.', ',') }} $
                    </td>
                    <td>
                        {{$quantity}}
                    </td>
                    <td>
                    </td>
            </tr>
            </tbody>
    </table>


</body>
</html>