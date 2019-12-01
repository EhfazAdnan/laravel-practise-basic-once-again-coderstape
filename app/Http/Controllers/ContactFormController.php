<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create(){
        return view('contact.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // send mail
        Mail::to('test@test.com')->send(new ContactFormMail($data));

        // another way to flash session message
        // session()->flash('message', 'Thanks for your message. We will be in touch');

        return redirect('contact')->with('message', 'Thanks for your message. We will be in touch');
    }
}
