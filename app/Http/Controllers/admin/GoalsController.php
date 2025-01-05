<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use Exception;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    public function create()
    {
        return view('admin.visi.create');
    }

    public function store(Request $request)
    {
        try {
            $validate_data = $request->validate([
                'visi' => 'required',
                'misi' => 'required',
            ]);
            Goal::create($validate_data);
            return redirect()->route('profile')->with('success', 'Visi-Misi Berhasil Ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('profile')->with('error', 'Visi-Misi Gagal Ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = Goal::findOrFail($id);
        return view('admin.visi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = Goal::findOrFail($id);
            $data->update($request->all());
            $data->save();
            return redirect()->route('profile')->with('success', 'Visi-Misi Berhasil Diupdate');
        } catch (Exception $e) {
            return redirect()->route('profile')->with('error', 'Visi-Misi Gagal Diupdate');
        }
    }

    public function destroy($id)
    {
        try {
            $data = Goal::findOrFail($id);
            $data->delete();
            return redirect()->route('profile')->with('success', 'Visi-Misi Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->route('profile')->with('error', 'Visi-Misi Gagal Dihapus');
        }
    }
}
