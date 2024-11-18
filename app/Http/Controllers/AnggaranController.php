<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use App\Models\Anggaran;
use App\Models\KodeRekening;
use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    //
    public function index(Request $request){
        $tahun = $request->tahun;

        // Menampilkan semua kode rekening dan anggarannya untuk tahun tertentu
        $anggarans = Anggaran::with('kodeRekening', 'tahun')
                              ->when($tahun, function($query) use ($tahun){
                                $query->whereHas('tahun', function($q) use ($tahun){
                                    $q->where('tahun', $tahun);
                                });
                              })
                              ->get();

        return view('anggaran', compact('anggarans', 'tahun'));
    }

    public function generateAnggaran(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'tahun' => 'required|integer|min:1900|max:2100', // Validasi range tahun
        ]);
    
        $tahunInput = $validated['tahun'];
    
        // Cek apakah tahun sudah ada di tabel tahun
        $tahun = Tahun::firstOrCreate(
            ['tahun' => $tahunInput], // Kondisi pencarian
            ['bulan' => 12] // Default value untuk bulan, sesuaikan dengan kebutuhan
        );
    
        // Ambil ID tahun
        $tahunId = $tahun->id;
    
        // Ambil semua kode rekening
        $kodeRekeningList = KodeRekening::all();
    
        foreach($kodeRekeningList as $kodeRekening){

            Anggaran::insert([
                'kode_rekening_id' => $kodeRekening->id,
                'tahun_id' => $tahunId,
                'nominal' => 0,
            ]);
        }

    
        return redirect()->back()->with('success', 'Anggaran berhasil digenerate');
    }

    public function update(Request $request, $id)
    {
        $anggaran = Anggaran::findOrFail($id);

        // Update nilai anggaran
        $anggaran->update([
            'nominal' => $request->nominal
        ]);

        return redirect()->back()->with('success', 'Anggaran berhasil diperbarui.');
    }
}
