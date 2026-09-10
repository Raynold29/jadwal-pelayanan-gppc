<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelayanan;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwalList = JadwalPelayanan::orderBy('tanggal', 'asc')->get();
        return view('jadwal.index', compact('jadwalList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal'  => 'required|date',
            'wl'       => 'nullable|string',
            'singer'   => 'nullable|string',
            'pemusik'  => 'nullable|string',
            'ohp'      => 'nullable|string',
            'doa'      => 'nullable|string',
            'warta'    => 'nullable|string',
            'kolektan' => 'nullable|string',
        ]);

        JadwalPelayanan::create($validated);
        return redirect()->back();
    }

    public function destroy($id)
    {
        JadwalPelayanan::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $jadwal = JadwalPelayanan::findOrFail($id);
        $jadwalList = JadwalPelayanan::orderBy('tanggal', 'asc')->get();
        return view('jadwal.index', compact('jadwal', 'jadwalList'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal'  => 'required|date',
            'wl'       => 'nullable|string',
            'singer'   => 'nullable|string',
            'pemusik'  => 'nullable|string',
            'ohp'      => 'nullable|string',
            'doa'      => 'nullable|string',
            'warta'    => 'nullable|string',
            'kolektan' => 'nullable|string',
        ]);

        $jadwal = JadwalPelayanan::findOrFail($id);
        $jadwal->update($validated);

        return redirect('/')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function pelayanView()
{
    $jadwals = JadwalPelayanan::orderBy('tanggal', 'ASC')->get();
    return view('jadwal.pelayan', compact('jadwals'));
}
}