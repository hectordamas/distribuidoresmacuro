<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class OperationController extends Controller
{
    public function findOperation($typeOperation){
        $products = Product::where('operation', $typeOperation)->get();
        $items = Cart::getContent();
        $countImport = 0;
        $countStock = 0;
        $quantity = 0;
        $totalStock = 0;
        $totalImport = 0;
        $totalMeasure = 0;
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
            $quantity = $quantity + $item->quantity;
        }
        $fillPercent = round(($totalMeasure * 75.900) / 100);
        return view('operations.index', [
            'products' => $products,
            'typeOperation' => $typeOperation,
            'count' => $items->count(),
            'countStock' => $countStock,
            'countImport' => $countImport,
            'fillPercent' => $fillPercent,
            'totalStock' => $totalStock,
            'totalImport' => $totalImport,
            'quantity' => $quantity, 
            'items' => $items
        ]);
    }


    public function findOperationAndCategory($typeOperation, $category){
        $products = Product::where('operation', $typeOperation)->where('category', $category)->get();
        $items = Cart::getContent();
        $countImport = 0;
        $countStock = 0;
        $quantity = 0;
        $totalStock = 0;
        $totalImport = 0;
        $totalMeasure = 0;
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
            $quantity = $quantity + $item->quantity;
        }
        $fillPercent = round(($totalMeasure * 75.900) / 100);
        return view('operations.index', [
            'products' => $products,
            'typeOperation' => $typeOperation,
            'count' => $items->count(),
            'countStock' => $countStock,
            'countImport' => $countImport,
            'fillPercent' => $fillPercent,
            'totalStock' => $totalStock,
            'totalImport' => $totalImport,
            'quantity' => $quantity, 
            'items' => $items
        ]);
    }
}
