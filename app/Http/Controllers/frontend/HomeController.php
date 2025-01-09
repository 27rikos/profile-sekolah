<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $latest_event = Event::latest()->limit(5)->get();
        $latest_news = Berita::where('status', 'publish')->with('kategoris')->orderBy('created_at', 'desc')->limit(3)->get();
        return view('frontpage.home', compact('latest_news', 'latest_event'));
    }
}
