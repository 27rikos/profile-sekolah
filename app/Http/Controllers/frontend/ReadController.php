<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class ReadController extends Controller
{
    public function detail_news($slug)
    {
        $latest_news = Berita::orderBy('created_at', 'asc')->limit(5)->get();
        $news = Berita::where('slug', $slug)->first();
        return view('frontpage.details.news', compact('news', 'latest_news'));
    }
}
