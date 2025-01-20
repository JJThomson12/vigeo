<?php

namespace App\Http\Controllers;

use App\Models\smp;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class smpController extends Controller
{
    public function index() : View
    {
        $smp = smp::all();
        return view('tampildata', ['smp' => $smp, 'title' => 'Tampil Data SMP']);
    }

    public function create() : View
    {
        return view('keloladata', ['title' => 'Tambah Data SMP']);
    }

    public function store(Request $request) : RedirectResponse
    {
        $validatedData = $request->validate([
            'nama'                  => 'required|string|max:255',
            'npsn'                  => 'required|string|max:20',
            'alamat'                => 'required|string',
            'desa_kelurahan'        => 'required|string|max:100',
            'kecamatan'             => 'required|string|max:100',
            'kabupaten_kota'        => 'required|string|max:100',
            'kode_pos'              => 'required|string|max:10',
            'status_sekolah'        => 'required|string|max:20',
            'waktu_penyelenggaraan' => 'required|string|max:50',
            'telepon'               => 'nullable|string|max:255',
            'email'                 => 'nullable|string|email|max:100',
            'website'               => 'nullable|string|max:255',
            'latitude'              => 'nullable|numeric',
            'longitude'             => 'nullable|numeric',
            'gambar'                => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/smp'), $imageName);
            $validatedData['gambar'] = $imageName;
        }

        smp::create($validatedData);

        return redirect()->route('tampil')->with('success', 'Data SMP berhasil disimpan.');
    }

    public function edit($id) : View
    {
    $smp = smp::findOrFail($id);
    return view('keloladata', ['smp' => $smp, 'title' => 'Edit Data SMP']);
    }

    public function update(Request $request, $id) : RedirectResponse
    {
    $validatedData = $request->validate([
        'nama'                  => 'required|string|max:255',
        'npsn'                  => 'required|string|max:20',
        'alamat'                => 'required|string',
        'desa_kelurahan'        => 'required|string|max:100',
        'kecamatan'             => 'required|string|max:100',
        'kabupaten_kota'        => 'required|string|max:100',
        'kode_pos'              => 'required|string|max:10',
        'status_sekolah'        => 'required|string|max:20',
        'waktu_penyelenggaraan' => 'required|string|max:50',
        'telepon'               => 'nullable|string|max:255',
        'email'                 => 'nullable|string|email|max:100',
        'website'               => 'nullable|string|max:255',
        'latitude'              => 'nullable|numeric',
        'longitude'             => 'nullable|numeric',
        'gambar'                => 'nullable|image|max:2048',
    ]);

    $smp = smp::findOrFail($id);
    if ($request->hasFile('gambar')) {
        // Delete old image if exists
        if ($smp->gambar && file_exists(public_path('img/smp/' . $smp->gambar))) {
            unlink(public_path('img/smp/' . $smp->gambar));
        }

        $image = $request->file('gambar');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img/smp'), $imageName);
        $validatedData['gambar'] = $imageName;
    }

    $smp->update($validatedData);

    return redirect()->route('tampil')->with('success', 'Data SMP berhasil diperbarui.');
    }

    public function destroy($id) : RedirectResponse
    {
    $smp = smp::findOrFail($id);

    // Delete image if exists
    if ($smp->gambar && file_exists(public_path('img/smp/' . $smp->gambar))) {
        unlink(public_path('img/smp/' . $smp->gambar));
    }

    $smp->delete();
    return redirect()->route('tampil')->with('success', 'Data SMP berhasil dihapus.');
    }

    public function getSmpData()
    {
    $smp = smp::all();
    return response()->json($smp);
    }
}
