<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();

        return view('products.index', [
            'products' => $products 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $fileName = "/images/".$name;
          }

        Product::create([
         'name' => $request->input('name'),
         'image' => $fileName,
         'operation' => $request->input('operation'),
         'category' => $request->input('category'),
         'details' => $request->input('details'),
         'sku' => $request->input('sku'),
         'price' => $request->input('price'),
         'stock' => $request->input('stock'),
         'measure' => $request->input('measure'),
         'measure2' => $request->input('measure2'),
        ]);

        return redirect()->back()->with('message', 'Se ha creado el producto de forma correcta');
    }


    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit', [
            'product' => $product
        ]);
    }

 
    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $fileName = "/images/".$name;
          }    
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->image = $fileName;
        $product->category = $request->input('category');
        $product->operation = $request->input('operation');
        $product->price = $request->input('price');
        $product->sku = $request->input('sku');
        $product->stock = $request->input('stock');
        $product->details = $request->input('details');
        $product->measure = $request->input('measure');
        $product->measure2 = $request->input('measure2');
        $product->save();
        return redirect('/products')->with('message', 'Producto Actualizado!');

    }


    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->back()->with('message', 'Producto Eliminado');
    }
}
