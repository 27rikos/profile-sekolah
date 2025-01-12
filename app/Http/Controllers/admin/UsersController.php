<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('admin.users.index', compact('data'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        try {
            $validate_users = $request->validate([
                'name' => 'required',
                'email' => 'email|required',
                'password' => 'required',
                'role' => 'required',
            ]);
            $hash_password = Hash::make($request->password);
            $data = User::create($validate_users);
            $data['password'] = $hash_password;
            $data->save();
            return redirect()->route('users-management.index')->with('success', 'User Berhasil Dibuat');
        } catch (Exception $e) {
            return redirect()->route('users-management.index')->with('error', 'User Gagal Dibuat');
        }
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.users.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = User::findOrFail($id);
            $data->update($request->all());
            return redirect()->route('users-management.index')->with('success', 'User Berhasil Diedit');
        } catch (Exception $e) {
            return redirect()->route('users-management.index')->with('error', 'User Gagal Diedit');
        }
    }

    public function destroy($id)
    {
        try {
            $data = User::findOrFail($id);
            $data->delete();
            return redirect()->route('users-management.index')->with('success', 'User Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->route('users-management.index')->with('success', 'User Gagal Dihapus');
        }
    }
}
