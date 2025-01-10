<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Facilty;
use App\Models\Goal;
use App\Models\History;

class ProfileSekolahController extends Controller
{
    public function index()
    {
        $data = Facilty::all();
        $sejarah = History::limit(1)->get();
        $goal = Goal::limit(1)->get();
        return view('frontpage.profile-sekolah', compact('sejarah', 'goal', 'data'));
    }
}
