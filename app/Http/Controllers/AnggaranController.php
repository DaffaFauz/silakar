<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\KodeRekening;
use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    //
    public function index(Request $request){
        $tahun = $request->input('tahun', date('Y'));

        // Menampilkan semua kode rekening dan anggarannya untuk tahun tertentu
        $anggarans = Anggaran::with('kodeRekening')
                              ->where('tahun', $tahun)
                              ->get();
        return view('anggaran', compact('anggarans', 'tahun'));
    }

    public function generateAnggaran(Request $request)
    {
        $tahun = $request->input('tahun');

        // Ambil semua kode rekening
        $kodeRekenings = KodeRekening::all();

        foreach ($kodeRekenings as $kodeRekening) {
            // Cek apakah anggaran untuk kode rekening dan tahun ini sudah ada
            $anggaranExists = Anggaran::where('kode_rekening_id', $kodeRekening->id)
                                       ->where('tahun', $tahun)
                                       ->exists();

            if (!$anggaranExists) {
                // Jika belum ada, buat entri anggaran baru
                Anggaran::create([
                    'kode_rekening_id' => $kodeRekening->id,
                    'tahun' => $tahun,
                    'nilai' => 0 // Nilai default, bisa diubah nantinya
                ]);
            }
        }

        return redirect()->back()->with('success', 'Kode Rekening berhasil digenerate untuk tahun ' . $tahun);
    }

    public function update(Request $request, $id)
    {
        $anggaran = Anggaran::findOrFail($id);

        // Update nilai anggaran
        $anggaran->update([
            'nilai' => $request->input('nilai')
        ]);

        return redirect()->back()->with('success', 'Anggaran berhasil diperbarui.');
    }
}
