<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaLainController extends Controller
{
    public function index()
    {
        $news = Berita::orderBy("created_at", "desc")->paginate(10);
        return view('frontpage.other_news', compact('news'));
    }
}