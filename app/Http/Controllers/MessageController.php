<?php

namespace App\Http\Controllers;

use App\Events\NewMessageNotification;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();

        return view('admin.message', compact('messages'));
    }

    function viewmessage(Message $message)
    {
        $messages = Message::find($message->id);

        return view('admin.viewmessage', compact('messages'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        $dataSend = [
            'name' => $data->name,
            'email' => $data->email,
            'subject' => $data->subject,
            'message' => $data->message,
            'time' => $data->created_at->format('D, d/mY')
        ];

        event(new NewMessageNotification($dataSend)); 

        return redirect()->back()->with('success', 'Berhasil Mengirimkan Pesan');
    }

    function destroy(Message $message)
    {
        $message->delete();

        return redirect()->back()->with('success', 'Message Deleted.');
    }

}
