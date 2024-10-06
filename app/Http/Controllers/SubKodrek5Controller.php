<?php

namespace App\Http\Controllers;

use App\Models\SubKodrek5;
use Illuminate\Http\Request;

class SubKodrek5Controller extends Controller
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
        $kodrek = SubKodrek5::create([
            'kode_rekening5' => $request->kodrek5,
            'uraian' => $request->uraian,
            'kode_rekening4' => $request->kodrek4,
        ]);
        $kodrek->save();
        return redirect()->to('/subkodrek5');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubKodrek5 $subKodrek5)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubKodrek5 $subKodrek5)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubKodrek5 $subKodrek5)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubKodrek5 $subKodrek5)
    {
        //
    }
}
