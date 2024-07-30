<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class ContactUsController extends Controller
{
    public function storeMessage(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:300',
        ]);

        // Create a new message record
        Message::create([
            'from' => $request->input('email'),
            'to' => 'pdad@gmail.com',
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}