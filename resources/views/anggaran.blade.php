<x-layout>
    @push('css')
        <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    @endpush

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Anggaran</h3>
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kode Rekening</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Data Anggaran
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#inlineForm"><i class="fa fa-print"></i> Generate Kode Rekening</button>
                </div>
                <div class="d-flex justify-content-start">
                    <div class="col-2 ms-4">
                        <label>Pilih Tahun</label>
                        <select name="" id="" class="form-control">
                            <option value=""disabled selected>Tahun</option>
                            <option value="">2019</option>
                            <option value="">2020</option>
                            <option value="">2021</option>
                            <option value="">2022</option>
                            <option value="">2024</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Rekening</th>
                                <th>Uraian</th>
                                <th>Anggaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggarans as $anggaran)
                                <tr>
                                    <td>{{ $anggaran->kodeRekening->kode_rekening }}</td>
                                    <td>{{ $anggaran->tahun }}</td>
                                    <td>{{ $anggaran->nominal }}</td>
                                    <td>
                                        <form action="{{ route('anggaran.update', $anggaran->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="nilai" value="{{ $anggaran->nilai }}"
                                                step="0.01">
                                            <button type="submit">Ubah</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Data Anggaran</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="/anggaran/generate" method="post">
                    @csrf
                    <div class="modal-body">
                        <label>Tahun</label>
                        <div class="form-group">
                            <input type="number" placeholder="YYYY" class="form-control" name="tahun" min="2000">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Generate</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade text-left" id="inlineForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Ubah Data Anggaran</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <label>Bulan &amp; Tahun</label>
                        <div class="form-group">
                            <input type="month" placeholder="Kode Rekening" class="form-control">
                        </div>
                        <label>Kode Rekening</label>
                        <div class="form-group">
                            <select name="" id="" class="form-control">
                                <option value="">Lorem ipsum dolor sit.</option>
                                <option value="">Lorem ipsum dolor sit.</option>
                                <option value="">Lorem ipsum dolor sit.</option>
                                <option value="">Lorem ipsum dolor sit.</option>
                            </select>
                        </div>
                        <label>Realisasi GU</label>
                        <div class="form-group">
                            <input type="text" placeholder="GU" class="form-control">
                        </div>
                        <label>Realisasi LS</label>
                        <div class="form-group">
                            <input type="text" placeholder="LS" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </button>
                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    @push('js')
        <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
        <script>
            // Simple Datatable
            let table1 = document.querySelector('#table1');
            let dataTable = new simpleDatatables.DataTable(table1);
        </script>
    @endpush
</x-layout>
