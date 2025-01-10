<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Facilty;
use App\Models\Goal;
use App\Models\History;

class ProfileController extends Controller
{
    public function index()
    {
        $histories = History::limit(1)->get();
        $goals = Goal::limit(1)->get();
        $data = Facilty::all();
        return view('admin.profile.index', compact('histories', 'goals', 'data'));
    }
}
