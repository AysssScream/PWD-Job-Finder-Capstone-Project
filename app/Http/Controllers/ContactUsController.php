<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Session;


class ContactUsController extends Controller
{
    public function storeMessage(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:300',
        ]);

        $existingMessage = Message::where('from', $request->input('email'))
            ->where('subject', $request->input('subject'))
            ->first();

        if ($existingMessage) {
            Session::flash('messageerror', [
                'type' => 'error',
                'message' => 'A message with the same email and subject already exists.'
            ]);
            return redirect()->back();
        }

        Message::create([
            'from' => $request->input('email'),
            'to' => 'pdad@gmail.com',
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Session::flash('contactus', 'You have successfully composed a message.');

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}