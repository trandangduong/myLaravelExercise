<?php

namespace App\Http\Controllers;

use app\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        /* dd(request()->all()); */
        $data = request()->validate([
            'name' => 'required',
            'mail' => 'required|mail',
            'message' => 'required',
        ]);

        Mail::to('test@test.com')->send(new ContactFormMail($data));
        
        return redirect('contact');
    }
}
