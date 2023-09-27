<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Symfony\Component\String\b;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::latest()->get();

        return view('admin.berita', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'required|mimes:jpeg,png',
        ]);

        $image = $request->file('gambar');
        $image->storeAs('public/img', $image->hashName());

        Berita::create([
            'judul' => $request->judul,
            'konten' => ($konten = strip_tags($request->konten)),
            'gambar' => Storage::url('public/img/' . $image->hashName()),
        ]);

        return redirect()
            ->route('admin.berita')
            ->with('success', 'Berhasil menambahkan Berita');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        
        if (!$berita) {
            return redirect()->back()->with('error', 'Berita tidak ditemukan!');
        }

        return view('berita', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Validasi input dari form
    $validatedData = $request->validate([
        'judul' => 'required',
        'konten' => 'required',
        'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Mengambil data berita berdasarkan id
    $berita = Berita::find($id);

    if (!$berita) {
        return redirect()->back()->with('error', 'Berita tidak ditemukan');
    }

    // Mengubah data berita sesuai input dari form dengan strip_tags
    $berita->judul = strip_tags($validatedData['judul']);
    $berita->konten = strip_tags($validatedData['konten']);

    // Jika ada gambar yang diupload, simpan gambar ke folder public/images
    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move(public_path('img'), $nama_gambar);

        // Hapus gambar lama jika ada
        if ($berita->gambar) {
            unlink(public_path('img') . '/' . $berita->gambar);
        }

        // Simpan nama gambar ke kolom gambar
        $berita->gambar = $nama_gambar;
    }

    // Simpan perubahan data berita ke database
    $berita->save();

    // Kembali ke halaman index dengan pesan sukses
    return redirect('berita')->with('success', 'Berita berhasil diupdate');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        Storage::delete('public/img' . $berita->id);

        $berita->delete();

        return redirect()
            ->route('admin.berita')
            ->with('success', 'Berhasil mengahpus berita');
    }
}
