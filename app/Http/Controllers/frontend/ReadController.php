<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Event;

class ReadController extends Controller
{
    public function detail_news($slug)
    {
        $latest_news = Berita::orderBy('created_at', 'asc')->limit(5)->get();
        $news = Berita::where('slug', $slug)->first();
        return view('frontpage.details.news', compact('news', 'latest_news'));
    }

    public function detail_event($id)
    {
        $event = Event::findOrfail($id);
        $latest_event = Event::orderBy('created_at', 'asc')->limit(5)->get();
        return view('frontpage.details.detail', compact('event', 'latest_event'));
    }
}