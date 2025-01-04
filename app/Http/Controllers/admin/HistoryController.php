<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\History;
use Exception;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function create()
    {

        return view('admin.sejarah.create', );
    }

    public function store(Request $request)
    {
        try {
            $validate_sejarah = $request->validate([
                'history' => 'required',
            ]);
            History::create($validate_sejarah);
            return redirect()->route('profile')->with('success', 'Sejarah Sekolah Berhasil Ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('profile')->with('error', 'Sejarah Sekolah Gagal Ditambahkan');
        }

    }
    public function edit($id)
    {
        $data = History::findOrFail($id);
        return view('admin.sejarah.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = History::findOrFail($id);
            $data->update($request->all());
            $data->save();
            return redirect()->route('profile')->with('success', 'Sejarah Berhasil Diubah');
        } catch (Exception $e) {
            return redirect()->route('profile')->with('success', 'Sejarah Gagal Diubah');
        }
    }

    public function destroy($id)
    {
        try {
            $data = History::findOrFail($id);
            $data->delete();
            return redirect()->route('profile')->with('success', 'Sejarah Berhasil Dihapusj');
        } catch (Exception $e) {
            return redirect()->route('profile')->with('error', 'Sejarah Gagal Dihapusj');
        }
    }
}
