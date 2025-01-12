<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Event;
use App\Models\Message;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $total_user = User::count();
        $total_news = Berita::count();
        $total_event = Event::count();
        $total_chat = Message::count();
        $latest_news = Berita::with('kategoris')->where('status', 'publish')->get();
        return view('admin.dashboard.index', compact([
            'total_user',
            'total_news',
            'latest_news',
            'total_event',
            'total_chat',
        ]));
    }
}
