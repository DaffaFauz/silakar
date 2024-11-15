<?php

namespace App\Http\Controllers;

use App\Models\KodeRekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KodeRekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kodeRekenings = KodeRekening::whereNull('parent_id')->with('childrenRecursive')->get();
        return view('kodrek', compact('kodeRekenings'));
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
    public function storeParent(Request $request)
    {
        //
        $rules = [
            'kode_rekening' => 'required|unique:kode_rekenings',
            'uraian' => 'required',
        ];

        $message = [
            'kode_rekening.required' => 'Kode Rekening tidak boleh kosong',
            'kode_rekening.unique' => 'Kode Rekening sudah ada',
            'uraian.required' => 'Uraian tidak boleh kosong',
        ];

        $validator = Validator::make(
            $request->all(),
            $rules,
            $message
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        KodeRekening::create([
            'kode_rekening' => $request->kode_rekening,
            'uraian' => $request->uraian,
            'parent_id' => null,
        ]);
        return redirect()->back()->with('success', 'Kode Rekening Berhasil Ditambahkan!');
    }

    public function storeChildren(Request $request, $parentId)
    {
        //
        $rules = [
            'kode_rekening' => 'required|unique:kode_rekenings',
            'uraian' => 'required',
        ];

        $message = [
            'kode_rekening.required' => 'Kode Rekening tidak boleh kosong',
            'kode_rekening.unique' => 'Kode Rekening sudah ada',
            'uraian.required' => 'Uraian tidak boleh kosong',
        ];

        $validator = Validator::make(
            $request->all(),
            $rules,
            $message
        );


        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $parent = KodeRekening::find($parentId);
        if (!$parent) {
            return redirect()->back()->withErrors(['Parent tidak ditemukan'])->withInput();
        }
    
        // Membuat kode_rekening baru dengan format "parent_kode_rekening.sub_kode"
        $kodrek = $parent->kode_rekening . '.' . $request->kode_rekening;  

        KodeRekening::create([
            'kode_rekening' => $kodrek,
            'uraian' => $request->uraian,
            'parent_id' => $parentId,
        ]);
        return redirect()->back()->with('success', 'Sub Kode Rekening Berhasil Ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(KodeRekening $kodeRekening)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KodeRekening $kodeRekening)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $kodeRekening = KodeRekening::find($id);

        if(!$kodeRekening){
            return redirect()->back()->withErrors(['Data tidak ditemukan!']);
        }

        $rules = [
            'kode_rekening' => 'required|unique:kode_rekenings,kode_rekekning,'. $id,
            'uraian' => 'required',
        ];

        $messages = [
            'kode_rekening.required' => 'Kode Rekening tidak boleh kosong',
            'kode_rekening.unique' => 'Kode Rekening sudah ada',
            'uraian.required' => 'Uraian tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $kodeRekening->update([
            'kode_rekening' => $request->kode_rekening,
            'uraian' => $request->uraian,
        ]);

        return redirect()->back()->with('success', 'Kode Rekening berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $kodeRekening = KodeRekening::find($id);

        if (!$kodeRekening) {
            return redirect()->back()->withErrors(['Data tidak ditemukan']);
        }
    
        // Hapus semua anak secara rekursif
        $kodeRekening->delete();
    
        return redirect()->back()->with('success', 'Kode Rekening beserta sub kode berhasil dihapus!');
    }

        
}
