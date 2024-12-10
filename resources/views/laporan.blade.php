<x-layout>
    @push('css')
        <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    @endpush

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Laporan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Laporan
                </div>
                <div class="d-flex justify-content-start">
                    <div class="col-2 ms-4">
                        <label>Pilih Tahun</label>
                        <form action="/laporan" method="GET">
                            <select name="tahun" id="tahun" class="form-control" onchange="this.form.submit()">
                                <option value="" disabled selected>Tahun</option>
                                @foreach ($t as $thn)
                                    <option value="{{ $thn->id }}" {{ $tahun == $thn->id ? 'selected' : '' }}>
                                        {{ $thn->tahun }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Anggaran</th>
                                <th>Realisasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($realisasi as $r)
                                @php
                                    // Pastikan bulan berupa angka
                                    $bulan = $r->bulan;

                                    // Daftar bulan dalam bahasa Indonesia
                                    $bulanIndonesia = [
                                        1 => 'Januari',
                                        2 => 'Februari',
                                        3 => 'Maret',
                                        4 => 'April',
                                        5 => 'Mei',
                                        6 => 'Juni',
                                        7 => 'Juli',
                                        8 => 'Agustus',
                                        9 => 'September',
                                        10 => 'Oktober',
                                        11 => 'November',
                                        12 => 'Desember',
                                    ];

                                    // Tentukan nama bulan atau tampilkan pesan error jika bulan tidak valid
                                    $namaBulan =
                                        $bulan >= 1 && $bulan <= 12 ? $bulanIndonesia[$bulan] : 'Invalid Month';
                                @endphp
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $namaBulan }}</td>
                                    <td>Rp. {{ number_format($r->total_anggaran) }}</td>
                                    <td>Rp. {{ number_format($r->total_realisasi) }}</td>
                                    <td><a href="/laporan/realisasi/{{ $r->bulan }}/{{ request('tahun') }}"
                                            class="btn btn-secondary rounded-circle"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

    @push('js')
        <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
        <script>
            // Simple Datatable
            let table1 = document.querySelector('#table1');
            let dataTable = new simpleDatatables.DataTable(table1);
        </script>
    @endpush
</x-layout>
