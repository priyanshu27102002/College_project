<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function submit (Request $request)
    {
        $validated = $request -> validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phonenumber'=>'required|string',
            'message' => 'required|string',

        ]);
        
        Mail::to('priyanshujash27@gmail.com')->send(new ContactFormMail($validated));
        return redirect (route('index'))->with("success","Your message has been sent Successfully");

    }

}
