<?php

namespace App\Http\Controllers;

use App\Models\Kodrek;
use App\Models\SubKodrek1;
use Illuminate\Http\Request;

class SubKodrek1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('subkodrek1', [
            'kodrek' => Kodrek::all(),
            'subkodrek1' => SubKodrek1::get(),
        ]);
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
        $subkodrek1 = join(".", array(Kodrek::find($request->kodrek)->kode_rekening, $request->kodrek1));
        // dd($subKodrek1);
        $kodrek = SubKodrek1::create([
            'kode_rekening1' => $subkodrek1,
            'uraian' => $request->uraian,
            'kode_rekening' => $request->kodrek,

        ]);
        $kodrek->save();
        return redirect()->to('/subkodrek1');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubKodrek1 $subKodrek1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubKodrek1 $subKodrek1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubKodrek1 $subKodrek1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubKodrek1 $subKodrek1)
    {
        //
    }
}
