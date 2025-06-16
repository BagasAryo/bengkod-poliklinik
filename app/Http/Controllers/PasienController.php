<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pages.admin.pasien', compact('pasiens'));
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
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_ktp' => 'required|string|max:16|unique:pasien,no_ktp',
            'no_hp' => 'required|string|max:15',
            'no_rm' => 'required|string|max:25',
        ]);
        Pasien::create($validatedData);
        return redirect()->route('pages.admin.pasien.index')->with('success', 'Pasien successfully created.');
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
        $pasien = Pasien::findOrFail($id);
        $pasiens = Pasien::all();
        return view('pages.admin.pasien_edit', compact('pasien', 'pasiens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_ktp' => 'required|string|max:16|unique:pasien,no_ktp,',
            'no_hp' => 'required|string|max:15',
            'no_rm' => 'required|string|max:25',
        ]);
        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());
        return redirect()->route('pages.admin.pasien.index')->with('success', 'Pasien successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obat = Pasien::findOrFail($id);
        $obat->delete();
        return redirect()->route('pages.admin.pasien.index')->with('success', 'Pasien successfully deleted.');
    }
}
