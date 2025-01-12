<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Ambil data pesan dalam urutan ascending
            $messages = Message::with('user')->orderBy('created_at', 'asc')->get();
            return response()->json(['messages' => $messages]);
        }

        return view('admin.chats.index');
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'pesan' => 'required_without:file|string|max:5000',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,gif,doc,docx,pdf|max:2048',
        ]);

        try {
            $filePath = null;
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                // Simpan file ke folder public/uploads/chat_files
                $file->move(public_path('uploads/chat_files'), $fileName);
                $filePath = 'uploads/chat_files/' . $fileName;
            }

            $message = Message::create([
                'id_user' => Auth::id(),
                'pesan' => $request->pesan ?? '',
                'file' => $filePath,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => $message->load('user'),
            ]);

        } catch (\Exception $e) {
            // Jika terjadi error dan file sudah terupload, hapus filenya
            if ($filePath && file_exists(public_path($filePath))) {
                unlink(public_path($filePath));
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to store message',
            ], 500);
        }
    }

}
