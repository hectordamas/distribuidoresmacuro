<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;
use Mail;
use App\User;

class CartOperationsController extends Controller
{
    public function clear(){
        $userId = Auth::id();
        Cart::clear();
        Cart::session($userId)->clear();
        return redirect()->back();
    }

    public function mail(){
        $items = Cart::getContent();
        $user = User::find(Auth::id());
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
        $data = [
            'products' => $items,
            'count' => $items->count(),
            'countStock' => $countStock,
            'countImport' => $countImport,
            'totalStock' =>  $totalStock,
            'totalImport' => $totalImport,
            'quantity' => $quantity,
            'user' => $user,
        ];
        Mail::send('cart.mail', $data, function($message){
            $subject = 'Pedido de distribuidoresmacuro ('.Auth::user()->company.')';
            $message->from('distribuidoresmacuro@gmail.com', $subject);
            $message->to('distribuidoresmacuro@gmail.com')->subject($subject)->cc(Auth::user()->email);
        });
        Cart::clear();
        return redirect()->back()->with('cartMessage', 'Se ha enviado su pedido correctamente, le hemos enviado un correo electrónico donde puede verificarlo. Nos pondremos en contacto con usted en las próximas horas');

    }
}
