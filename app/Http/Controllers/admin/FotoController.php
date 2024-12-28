<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Exception;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function index()
    {
        $data = Photo::paginate(10);
        return view('admin.foto.index', compact('data'));
    }

    public function create()
    {
        return view('admin.foto.create');
    }

    public function store(Request $request)
    {
        try {
            $validate_photo = $request->validate([
                'title' => 'required',
                'deskripsi' => 'nullable',
                'file' => 'required|max:2048',
            ]);
            $data = Photo::create($validate_photo);

            if (request()->hasFile('file')) {
                $fileName = $request->file('file')->getClientOriginalName();
                $request->file('file')->move('images/foto_gallery/', $fileName);
                $data->file = $fileName;
                $data->save();
            }
            return redirect()->route('photo.index')->with('success', 'Foto Berhasil Ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('photo.index')->with('error', 'Foto Gagal Ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = Photo::findOrFail($id);
        return view('admin.foto.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = Photo::findOrFail($id);
            $update_photo = $request->all();

            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                if ($data->file) {
                    $oldImage = public_path('images/foto_gallery/' . $data->file);
                    unlink($oldImage);
                }
                $fileName = $request->file('file')->getClientOriginalName();
                $request->file('file')->move('images/foto_gallery/', $fileName);
                $update_photo['file'] = $fileName;
            }
            $data->update($update_photo);
            return redirect()->route('photo.index')->with('success', 'Foto Berhasil Diupdate');
        } catch (Exception $e) {
            return redirect()->route('photo.index')->with('error', 'Foto Gagal Diupdate');
        }

    }

    public function destroy($id)
    {
        try {
            $data = Photo::findOrFail($id);
            if ($data->file) {
                $image = public_path('images/foto_gallery/' . $data->file);
                unlink($image);
            }
            $data->delete();
            return redirect()->route('photo.index')->with('success', 'Foto Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->route('photo.index')->with('error', 'Foto Gagal Dihapus');
        }
    }
}
