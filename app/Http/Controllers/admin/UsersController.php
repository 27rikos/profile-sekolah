<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }
}