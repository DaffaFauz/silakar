<?php

namespace Database\Seeders;

use App\Models\KodeRekening;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KodeRekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        KodeRekening::create([
            'kode_rekening' => '5',
            'uraian' => 'Belanja Daerah',
            'parent_id' => null,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1',
            'uraian' => 'Belanja Operasi',
            'parent_id' => 1,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.01',
            'uraian' => 'Belanja Pegawai',
            'parent_id' => 2,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.01.03',
            'uraian' => 'Tambahan Penghasilan berdasarkan Pertimbangan Objektif Lainnya ASN',
            'parent_id' => 3,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.01.03.06',
            'uraian' => 'Belanja Jasa Pelayanan Kesehatan bagi ASN',
            'parent_id' => 4,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.01.03.06.0001',
            'uraian' => 'Belanja Jasa Pelayanan Kesehatan bagi ASN',
            'parent_id' => 5,
        ]);
    }
}
