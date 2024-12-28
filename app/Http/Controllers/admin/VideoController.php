<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $data = Video::paginate(10);
        return view('admin.video.index', compact('data'));
    }

    public function create()
    {
        return view('admin.video.create');
    }

    public function store(Request $request)
    {
        try {
            $validate_video = $request->validate([
                'title' => 'required',
                'url' => 'required',
                'file' => 'required|max:2048',
            ]);
            $data = Video::create($validate_video);

            if ($request->hasFile('file')) {
                $fileName = $request->file('file')->getClientOriginalName();
                $request->file('file')->move('images/thumbnail/', $fileName);
                $data->file = $fileName;
                $data->save();
            }
            return redirect()->route('videos.index')->with('success', 'Video Berhasil Ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('videos.index')->with('error', 'Video Gagal Ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = Video::findOrFail($id);
        return view('admin.video.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        try {
            $data = Video::findOrFail($id);
            $updated_video = $request->all();

            if ($request->hasFile('file') && $request->file('file')->isValid()) {

                if ($data->file) {
                    $oldImage = public_path('images/thumbnail/' . $data->file);
                    unlink($oldImage);

                    $fileName = $request->file('file')->getClientOriginalName();
                    $request->file('file')->move('images/thumbnail/', $fileName);
                    $updated_video['file'] = $fileName;
                }
            }
            $data->update($updated_video);
            return redirect()->route('videos.index')->with('success', 'Video Berhasil Diupdate');
        } catch (Exception $e) {
            return redirect()->route('videos.index')->with('error', 'Video Gagal Diupdate');
        }

    }

    public function destroy($id)
    {
        try {
            $data = Video::findOrFail($id);
            if ($data->file) {
                $oldImage = public_path('images/thumbnail/' . $data->file);
                unlink($oldImage);
            }
            $data->delete();
            return redirect()->route('videos.index')->with('success', 'Video Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->route('videos.index')->with('error', 'Video Gagal Dihapus');
        }
    }

}
