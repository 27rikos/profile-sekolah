<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $data = Event::all();
        return view('admin.event.index', compact('data'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        try {
            $validate_event = $request->validate([
                'event' => 'required',
                'deskripsi' => 'required',
                'tanggal' => 'required|date',
            ]);
            Event::create($validate_event);
            return redirect()->route('event.index')->with('success', 'Acara Berhasil Ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('event.index')->with('error', 'Acara Gagal Ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = Event::findOrFail($id);
        return view('admin.event.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = Event::findOrFail($id);
            $data->update($request->all());
            $data->save();
            return redirect()->route('event.index')->with('success', 'Acara Berhasil Diupdate');
        } catch (Exception $e) {
            return redirect()->route('event.index')->with('error', 'Acara Gagal Diupdate');
        }
    }

    public function destroy($id)
    {
        try {
            $data = Event::findOrFail($id);
            $data->delete();
            return redirect()->route('event.index')->with('success', 'Acara Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->route('event.index')->with('error', 'Acara Gagal Dihapus');
        }
    }
}
