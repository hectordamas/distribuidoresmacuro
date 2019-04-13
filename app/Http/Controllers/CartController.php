<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Cart::getContent();
        $countImport = 0;
        $countStock = 0;
        $quantity = 0;
        $totalStock = 0;
        $totalImport = 0;
        foreach($items as $item){
            if($item->attributes['operation'] == 'Importar'){
                $countImport = $countImport + $item->quantity;
                $totalImport = $totalImport + ($item->attributes['price'] * $item->quantity);
            }
            if($item->attributes['operation'] == 'Stock'){
                $countStock = $countStock + $item->quantity;
                $totalStock = $totalStock + ($item->attributes['price'] * $item->quantity);
            }
            $quantity = $quantity + $item->quantity;
        }
        return view('cart.index',[
            'products' => $items,
            'count' => $items->count(),
            'countStock' => $countStock,
            'countImport' => $countImport,
            'totalStock' =>  number_format($totalStock, 2, '.', ','),
            'totalImport' => number_format($totalImport, 2, '.', ','),
            'quantity' => $quantity
        ]);
    }

    public function store(Request $request)
    {
        $product = Product::find($request->id);
        Cart::add($product->id, $product->name, $product->price, $request->qty, [
            'operation' => $product->operation,
            'category' => $product->category,
            'sku' => $product->sku,
            'price' => $product->price,
            'stock' => $product->stock,
            'measure' => $product->measure2
        ]);
        $items = Cart::getContent();
        $countImport = 0;
        $countStock = 0;
        $totalMeasure = 0;
        $totalStock = 0;
        $totalImport = 0;
        foreach($items as $item){
            if($item->attributes['operation'] == 'Importar'){
                $countImport = $countImport + $item->quantity;
                $totalImport = $totalImport + ($item->attributes['price'] * $item->quantity);
            }
            if($item->attributes['operation'] == 'Stock'){
                $countStock = $countStock + $item->quantity;
                $totalStock = $totalStock + ($item->attributes['price'] * $item->quantity);
            }
            if($item->attributes['operation'] == 'Importar'){
                $totalMeasure = $totalMeasure + ($item->attributes['measure'] * $item->quantity);
            }
        }
        $fillPercent = round(($totalMeasure * 75.900) / 100);
        return response()->json([
            'product' => $product,
            'price' => number_format($product->price, 2, '.', ','),
            'quantity' => $request->qty,
            'count' => $items->count(),
            'countStock' => $countStock,
            'countImport' => $countImport,
            'fillPercent' => $fillPercent,
            'totalStock' =>  number_format($totalStock, 2, '.', ','),
            'totalImport' => number_format($totalImport, 2, '.', ','),
        ]);
    }


    public function edit(Request $request, $id){
        $item = Cart::get($id);
        return response()->json([
            'item' => $item
        ]);
    }
    public function update(Request $request, $id)
    {
        Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->input('quantity')
            ],
        ]);
        return redirect()->back()->with('message', 'Pedido modificado!');
    }


    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('message', 'Producto Eliminado');
    }
}
