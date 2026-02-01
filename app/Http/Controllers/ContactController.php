<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Show contact form (optional)
    public function index()
    {
        return view('contact'); // make sure you have resources/views/contact.blade.php
    }

    // Handle form submit
    public function submit(Request $request)
    {
        // Validate form
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'nullable|string|max:20',
            'email'   => 'required|email',
            'comment' => 'required|string',
        ]);

        // Save message to DB
        Contact::create([
            'name'    => $request->name,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'comment' => $request->comment,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}