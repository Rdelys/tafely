<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'message' => 'required|string|max:2000',
        ]);

        Mail::to('contact@tafely-gr.com')->send(new ContactMail($data));

        return back()->with('success', 'Votre message a bien été envoyé. Nous vous répondrons rapidement !');
    }
}