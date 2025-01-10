<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return view('admin.chats.index');
    }

}
