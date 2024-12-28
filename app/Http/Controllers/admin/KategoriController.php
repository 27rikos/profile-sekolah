<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita_category;
use Exception;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Berita_category::all();
        return view('admin.kategori.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $validate = $request->validate([
                'kategori' => 'required',
            ]);
            Berita_category::create($validate);
            return redirect()->route('kategori-berita.index')->with('success', 'kategori Berhasil Ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('kategori-berita.index')->with('error', 'Kategori Gagal Ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = Berita_category::findOrFail($id);
        return view('admin.kategori.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = Berita_category::findOrFail($id);
            $data->update($request->all());
            return redirect()->route('kategori-berita.index')->with('success', 'Kategori Berhasil Diupdate');
        } catch (Exception $e) {
            return redirect()->route('kategori-berita.index')->with('error', 'Kategori Gagal Diupdate');
        }
    }
    public function destroy($id)
    {
        try {
            $data = Berita_category::findOrFail($id);
            $data->delete();
            return redirect()->route('kategori-berita.index')->with('success', 'Kategori Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->route('kategori-berita.index')->with('error', 'Kategori Gagal Dihapus');
        }
    }
}
