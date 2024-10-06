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
    public function store(Request $request): RedirectResponse
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(Kodrek $kodrek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kodrek $kodrek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kodrek $kodrek)
    {
        //
        Kodrek::find($kodrek)->delete();
        return redirect()->to('/kodrek');
    }
}
