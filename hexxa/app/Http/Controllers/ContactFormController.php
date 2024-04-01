<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactFormController extends     Controller
{
    public function submitForm(Request $request)
    {
        // Form submission data ko process karein
        // For example:
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        // Mail ko send karne ke liye
        Mail::to('rizwanrvk21@gmail.com')->send(new ContactFormMail($name, $email, $message));

        // Yahaan par aap redirect kar sakte hain, agar aap chahte hain
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
