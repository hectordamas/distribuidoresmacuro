<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class OperationController extends Controller
{
    public function findOperation($typeOperation){
        $products = Product::where('operation', $typeOperation)->get();
        return view('operations.index', [
            'products' => $products,
            'typeOperation' => $typeOperation
        ]);
    }
}
