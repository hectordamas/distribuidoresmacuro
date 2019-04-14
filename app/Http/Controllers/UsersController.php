<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;

class UsersController extends Controller
{
    public function index(){
      $users = User::all();
      return view('users.index', [
        'users' => $users
      ]);
    }

    public function mail(Request $request){
        $data = [
            'company' => $request->input('company'),
            'telephone' => $request->input('telephone'),
            'name' => $request->input('name'),
            'cellphone' => $request->input('cellphone'),
            'email' => $request->input('email'),
            'city' => $request->input('city'),
            'rif' => $request->input('rif'),
          ];
          Mail::send('users.mail', $data, function($message){
            $subject = 'Mail para confirmar el registro de Usuario en distribuidoresMacuro';
            $message->from('distribuidoresmacuro@gmail.com', $subject);
            $message->to('distribuidoresmacuro@gmail.com')->subject($subject);
          });
          return redirect()->back()->with('message', 'Se ha enviado su información, nos pondremos en contacto con usted en las próximas 48h');
    }
}
