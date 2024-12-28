<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class ValidatingController extends Controller
{
    public function publish($id)
    {
        $data = Berita::findOrFail($id);
        $data->update([
            'status' => 'publish',
        ]);
        return redirect()->route('berita.index')->with('success', 'Berita Diterbitkan');
    }

    public function draft($id)
    {
        $data = Berita::findOrFail($id);
        $data->update([
            'status' => 'draft',
        ]);
        return redirect()->route('berita.index')->with('success', 'Berita Ditarik Ulang');
    }
}
