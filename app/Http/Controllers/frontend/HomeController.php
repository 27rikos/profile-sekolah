<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        $latest_news = Berita::where('status', 'publish')->with('kategoris')->orderBy('created_at', 'asc')->limit(3)->get();
        return view('frontpage.home', compact('latest_news'));
    }
}
