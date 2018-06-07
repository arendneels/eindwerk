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
}
