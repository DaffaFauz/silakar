<?php

namespace App\Http\Controllers;

use App\Models\Kodrek;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KodrekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kodrek', [
            'kodrek' => Kodrek::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'kodrek' => 'required|numeric|unique:kodreks|digits:1',
            'uraian' => 'required'
        ],
        [
            'required' => 'Kolom harus diisi!',
            'numeric' => 'Nilai yang diisi harus berupa angka!',
            'unique' => 'Kode rekening sudah ada!',
            'digits' => 'Kode rekening hanya boleh 1 digit!']);


        $kodrek = Kodrek::create([
            'kode_rekening' => $request->kodrek,
            'uraian' => $request->uraian
        ]);
        $kodrek->save();
        return redirect()->to('/kodrek');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kodrek $kodrek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'kodrek' => 'required|numeric|unique:kodreks|digits:1',
            'uraian' => 'required'
        ],
        [
            'required' => 'Kolom harus diisi!',
            'numeric' => 'Nilai yang diisi harus berupa angka!',
            'unique' => 'Kode rekening sudah ada!',
            'digits' => 'Kode rekening hanya boleh 1 digit!']);
            
        $kodrek = Kodrek::find($id);
        $kodrek->update([
            'kode_rekening' => $request->kodrek,
            'uraian' => $request->uraian,
            ]);
            return redirect()->to('/kodrek');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $hapus = Kodrek::findorfail($id);
        $hapus->delete();
        
        return redirect()->to('/kodrek');
    }
}
