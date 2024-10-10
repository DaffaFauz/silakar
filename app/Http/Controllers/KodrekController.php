<?php

namespace App\Http\Controllers;

use App\Models\Kodrek;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Exception;

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
    public function store(Request $request)
    {
        try {
            $rules = [
                'kode_rekening' => 'required|numeric|unique:kodreks|digits:1',
                'uraian' => 'required'
            ];

            $customMessages = [
                'kode_rekening.required' => 'Kolom harus diisi!',
                'kode_rekening.numeric' => 'Nilai yang diisi harus berupa angka!',
                'kode_rekening.unique' => 'Kode rekening sudah ada!',
                'kode_rekening.digits' => 'Kode rekening hanya boleh 1 digit!',
                'uraian.required' => 'Kode rekening hanya boleh 1 digit!'
            ];
            $validator = Validator::make(
                $request->all(),
                $rules,
                $customMessages
            );

            if ($validator->fails()) {
                return redirect('/kodrek')->withErrors($validator->errors());
            }
            DB::transaction(function () use ($request) {
                Kodrek::create([
                    'kode_rekening' => $request->kode_rekening,
                    'uraian' => $request->uraian
                ]);
            });
            return redirect('/kodrek')->with('success', 'Kode Rekening berhasil ditambahkan!');
        } catch (\Exception $exception) {
            return redirect('/kodrek')->with('failed', $exception->getMessage());
        }
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
        // return redirect()->to('/kodrek');
        if ($kodrek) {
            return redirect('/kodrek')->with('success', 'Kode Rekening berhasil diubah!');
        } else {
            return redirect('/kodrek')->with('failed', 'Kode Rekening gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $hapus = Kodrek::findorfail($id);
        $hapus->delete();

        // return redirect('/kodrek')->with('/kodrek');
        if (!$hapus) {
            return redirect('/kodrek')->with('failed', 'Kode Rekening gagal dihapus!');
        } else {
            return redirect('/kodrek')->with('/kodrek');
        }
    }
}
