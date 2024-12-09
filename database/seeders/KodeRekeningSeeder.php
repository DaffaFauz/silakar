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
        KodeRekening::create([
            'kode_rekening' => '5.1.02',
            'uraian' => 'Belanja Barang dan Jasa',
            'parent_id' => 2,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01',
            'uraian' => 'Belanja Barang',
            'parent_id' => 7,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01',
            'uraian' => 'Belanja Barang Pakai Habis',
            'parent_id' => 8,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0001',
            'uraian' => 'Belanja Bahan-Bahan Bangunan dan Konstruksi',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0004',
            'uraian' => 'Belanja Bahan-Bahan Bakar dan Pelumas',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0010',
            'uraian' => 'Belanja Bahan-Isi Tabung Gas',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0014',
            'uraian' => 'Belanja Suku Cadang-Suku Cadang Alat Besar',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0024',
            'uraian' => 'Belanja Alat/Bahan untuk Kegiatan Kantor-Alat Tulis Kantor',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0025',
            'uraian' => 'Belanja Alat/Bahan untuk Kegiatan Kantor-Kertas dan Cover',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0026',
            'uraian' => 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Cetak',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0027',
            'uraian' => 'Belanja Alat/Bahan untuk Kegiatan Kantor-Benda Pos',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0029',
            'uraian' => 'Belanja Alat/Bahan untuk Kegiatan Kantor-Bahan Komputer',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0030',
            'uraian' => 'Belanja Alat/Bahan untuk Kegiatan Kantor-Perabot Kantor',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0031',
            'uraian' => 'Belanja Alat/Bahan untuk Kegiatan Kantor-Alat Listrik',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0037',
            'uraian' => 'Belanja Obat-Obatan-Obat',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0038',
            'uraian' => 'Belanja Obat-Obatan-Obat-Obatan Lainnya',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0043',
            'uraian' => 'Belanja Natura dan Pakan-Natura',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0052',
            'uraian' => 'Belanja Makanan dan Minuman rapat',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0053',
            'uraian' => 'Belanja Makanan dan Minuman Jamuan tamu',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0056',
            'uraian' => 'Belanja Makanan dan Minuman pada Fasilitas Pelayanan Urusan Kesehatan',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0070',
            'uraian' => 'Belanja Pakaian Pelatihan Kerja',
            'parent_id' => 9,
        ]);
        KodeRekening::create([
            'kode_rekening' => '5.1.02.01.01.0075',
            'uraian' => 'Belanja Pakaian Batik Tradisional',
            'parent_id' => 9,
        ]);
    }
}
