<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $jumlah = $request->gu + $request->ls;
        $saldo = $request->nominal - $jumlah;
        $tahun = date("Y", strtotime($request->bulan));
        $bulan = date("m", strtotime($request->bulan));
        $anggaran = Anggaran::create([
            'nominal' => $request->nominal,
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kode_rekening4' => $request->kodrek5,
            'uraian' => $request->uraian,
            'realisasi_gu' => $request->gu,
            'realisasi_ls' => $request->ls,
            'jumlah_realisasi' => $jumlah,
            'persentase_anggaran' => $jumlah,
            'saldo_anggaran' => $saldo,
        ]);
        $anggaran->save();
        return redirect()->to('/anggaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggaran $anggaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggaran $anggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggaran $anggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggaran $anggaran)
    {
        //
    }
}
