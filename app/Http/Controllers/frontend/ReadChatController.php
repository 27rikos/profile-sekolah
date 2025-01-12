<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ReadChatController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $messages = Message::with('user')->orderBy('created_at', 'asc')->get();
            return response()->json(['messages' => $messages]);
        }
    }

    public function storeMessage(Request $request)
    {
        $request->validate([
            'pesan' => 'required',
        ]);

        $message = new Message();
        $message->pesan = $request->pesan;
        $message->id_user = auth()->user()->id; // Assuming you're using authentication
        $message->save();

        return response()->json(['success' => true, 'message' => $message]);
    }

}
