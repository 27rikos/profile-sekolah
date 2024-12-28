<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Berita_category;
use Exception;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::with('kategoris')->get();
        return view('admin.berita.index', compact('data'));
    }

    public function create()
    {
        $kategori = Berita_category::all();
        return view('admin.berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'judul' => 'required',
                'kategori_id' => 'required',
                'penulis' => 'required',
                'konten' => 'required',
                'tanggal' => 'required|date',
            ]);
            $data = Berita::create([
                'judul' => $request->judul,
                'kategori_id' => $request->kategori_id,
                'penulis' => $request->penulis,
                'konten' => $request->konten,
                'tanggal' => $request->tanggal,
                'file' => $request->file,
            ]);
            if ($request->hasFile('file')) {
                $request->file('file')->move('images/berita_image', $request->file('file')->getClientOriginalName());
                $data->file = $request->file('file')->getClientOriginalName();
                $data->save();
            }
            return redirect()->route('berita.index')->with('success', 'Berita Berhasil Ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('berita.index')->with('error', 'Berita Gagal Ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = Berita::findOrFail($id);
        $kategori = Berita_category::all();
        return view('admin.berita.edit', compact('data', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = Berita::findOrFail($id);

            $updatedData = $request->all();
            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                if ($data->file) {
                    $oldImage = public_path('images/berita_image/' . $data->file);
                    unlink($oldImage);
                }
                $fileName = $request->file('file')->getClientOriginalName();
                $request->file('file')->move('images/berita_image', $fileName);

                $updatedData['file'] = $fileName;
            }
            $data->update($updatedData);
            return redirect()->route('berita.index')->with('success', 'Berita Berhasil Diubah');
        } catch (Exception $e) {
            return redirect()->route('berita.index')->with('error', 'Berita Gagal Diubah');
        }
    }

    public function destroy($id)
    {
        try {
            $data = Berita::findOrFail($id);
            if ($data->file) {
                $oldImage = public_path('images/berita_image/' . $data->file);
                unlink($oldImage);
            }
            $data->delete();
            return redirect()->route('berita.index')->with('success', 'Berita Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->route('berita.index')->with('error', 'Berita Gagal Dihapus');
        }
    }
}
