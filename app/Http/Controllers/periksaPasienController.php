<?php

namespace App\Http\Controllers;

use App\Models\DetailPeriksa;
use App\Models\Obat;
use App\Models\Periksa;
use Illuminate\Http\Request;

class periksaPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periksas = Periksa::all();
        return view('pages.dokter.periksa_pasien', compact('periksas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $periksa = Periksa::findOrFail($id);
        $obats = Obat::all();
        return view('pages.dokter.periksa_pasien_edit', compact('periksa', 'obats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string|max:500',
            'id_obat' => 'array|required',
            'id_obat.*' => 'required|exists:obat,id',
        ]);

        $periksa = Periksa::findOrFail($id);
        $periksa->update([
            'tgl_periksa' => $request->tgl_periksa,
            'catatan' => $request->catatan,
        ]);

        foreach ($request->id_obat as $id_obat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $id_obat,
            ]);
        }

        $totalHargaObat = Obat::whereIn('id', $request->id_obat)->sum('harga');

        $biayaKonsul = 50000; // Biaya konsultasi tetap
        $totalBiaya = $totalHargaObat + $biayaKonsul;

        $periksa->update([
            'total_biaya' => $totalBiaya,
        ]);

        return redirect()->route('pages.dokter.periksa_pasien.index')
            ->with('success', 'Periksa pasien berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
