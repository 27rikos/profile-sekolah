<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Facilty;
use Exception;
use Illuminate\Http\Request;

class FacylitesController extends Controller
{
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'judul' => 'required',
            'file' => 'required|max:2040',
        ]);
        $data = Facilty::create($validate_data);
        if ($request->hasFile('file')) {
            $request->file('file')->move('images/fasilitas_image', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }
        try {
            return redirect()->route('profile')->with('success', 'Fasilitas Sekolah Berhasil Ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('profile')->with('error', 'Fasilitas Sekolah Gagal Ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = Facilty::findOrFail($id);
        return view('admin.fasilitas.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = Facilty::findOrFail($id);
            $updated_facilty = $request->all();
            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                if ($data->file) {
                    $oldImage = public_path('images/fasilitas_image/' . $data->file);
                    unlink($oldImage);
                }
                $fileName = $request->file('file')->getClientOriginalName();
                $request->file('file')->move('images/fasilitas_image/', $fileName);
                $updated_facilty['file'] = $fileName;
            }
            $data->update($updated_facilty);
            return redirect()->route('profile')->with('success', 'Fasilitas sekolah Berhasil Diedit');
        } catch (Exception $e) {
            return redirect()->route('profile')->with('error', 'Fasilitas sekolah Gagal Diedit');
        }
    }

    public function destroy($id)
    {
        try {
            $data = Facilty::findOrFail($id);
            if ($data->file) {
                $oldImage = public_path('images/fasilitas_image/' . $data->file);
                unlink($oldImage);
            }
            $data->delete();
            return redirect()->route('profile')->with('success', 'Fasilitas Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->route('profile')->with('error', 'Fasilitas Gagal Dihapus');
        }
    }
}
