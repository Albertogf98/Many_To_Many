<?php

namespace App\Http\Controllers;

use App\Mail\OrdersMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function getMail() {
       return view('email.email');
    }

    public function postMail(Request $request) {

        if ($request->method() === 'POST' && !empty($request->messege)) {
            $mail = new OrdersMail($request->messege);
            Mail::to($request->simulatorMailAddress)->send($mail);
            flash('Correo enviado correctamente, le hemos enviado una notificación a su gmail')->success()->important();
            return view('email.response', ['messege' => $request->messege]);
        } else {
            flash('Tienes que escribir el mensaje si quieres enviarlo.')->error()->important();
            return redirect('/email');
        }
    }
}
