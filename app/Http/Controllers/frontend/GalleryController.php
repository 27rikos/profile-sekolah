<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Video;

class GalleryController extends Controller
{
    public function foto()
    {
        $foto = Photo::paginate(20);
        return view('frontpage.foto', compact('foto'));
    }

    public function video()
    {
        $video = Video::paginate(20);
        return view('frontpage.videos', compact('video'));
    }
}
