<?php

namespace App\Http\Controllers\back;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('back.messages.index', compact('messages'));
    }

    public function show($id){
        $message = Message::findOrFail($id);
        // Make is_read property true when first opening the message
        if(!$message->is_read){
            $message->is_read = true;
            $message->save();
        }
        return view('back.messages.show', compact('message'));
    }
}
