<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use TCG\Voyager\Facades\Voyager;

class Contact extends Controller
{
    public function sendContact(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'message-c' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules, $message = [
            'required' => 'Campo obligatorio',
            'email' => 'Email Invalido'
        ]);

        if($validator->fails()) {
            echo '{ "alert": "error", "message": "Formulario no válido" }';
            exit;
        }

        $messageC = $request->get('message-c');
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'messageC' => $messageC
        ];
        try {
            Mail::to('parkingelbalcondebaeza@gmail.com')->send(new \App\Mail\Contact($data));
            echo '{ "alert": "success", "message": "Mensaje enviado con exito" }';
            exit;
        } catch (\Exception $e){
        }

        echo '{ "alert": "error", "message": "Error al enviar el formulario" }';
        exit;
    }
}
