<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('pages.contact');
    }
    public function store()
    {
        $data = request()->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'mailMessege' => 'required|min:10'
        ]);
        //change mail when admin is created!
        Mail::to('admin@brightf.com')->send(new ContactMail($data));
        return redirect('contact')->with('success', 'Thank you for contacting us!');
    }
}