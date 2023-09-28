<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::orderBy('id', 'desc')->get();

        return view('admin.galeri', compact('galeri'));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'galeri' => 'image|required|mimes:png,jpg',
        ]);

        $image = $request->file('galeri');
        $image->storeAs('public/img', $image->hashName());

        Galeri::create([
            'galeri' => Storage::url('public/img/' . $image->hashName()),
        ]);

        return redirect()
            ->route('admin.galeri')
            ->with('success', 'Galeri berhasil ditambah');
    }

    public function edit($id)
    {
        $galeri = Galeri::find($id);

        if (!$galeri) {
            return redirect()
                ->back()
                ->with('error', 'gambar tidak ditemukan!');
        }

        return view('galeri', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'galeri' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $galeri = Galeri::find($id);

        if (!$galeri) {
            return redirect()
                ->back()
                ->with('error', 'Gambar tidak ditemukan');
        }

        if ($request->hasFile('galeri')) {
            $gambar = $request->file('galeri');
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('img'), $nama_gambar);

            // Hapus gambar lama jika ada
            if ($galeri->galeri) {
                unlink(public_path('img') . '/' . $galeri->galeri);
            }

            // Simpan nama gambar ke kolom gambar
            $galeri->galeri = $nama_gambar;
        }

        $galeri->save();

        return redirect('galeri')->with('success', 'berita berhasil diupdate');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::delete('public/img' . $galeri->id);

        $galeri->delete();

        return redirect()
            ->route('admin.galeri')
            ->with('success', 'Berhasil menghapus 1 gambar');
    }
}
