<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use App\Models\History;

class ProfileController extends Controller
{
    public function index()
    {
        $data = History::limit(1)->get();
        $goals = Goal::limit(1)->get();
        return view('admin.profile.index', compact('data', 'goals'));
    }
}
