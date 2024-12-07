<x-layout>
    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
    @endpush

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Realisasi Anggaran</h3>
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
                            <li class="breadcrumb-item active" aria-current="page">Realisasi Anggaran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Realisasi Anggaran
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#inlineForm"><i class="fa fa-print"></i> Generate Kode Rekening</button>
                </div>
                <div class="d-flex justify-content-start">
                    <div class="col-4 ms-4">
                        <form action="/realisasi/filter" method="get" class="row">
                            <div class="col">
                                <label>Pilih Tahun</label>
                                <select name="tahun" id="" class="form-control">
                                    <option value="" selected disabled>- Tahun -</option>
                                    @foreach ($tahun as $t)
                                        <option value="{{ $t->id }}"
                                            {{ request('tahun') == $t->id ? 'selected' : '' }}>{{ $t->tahun }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label>Pilih Bulan</label>
                                <select name="bulan" id="" onchange="this.form.submit()"
                                    class="form-control">
                                    <option value="" selected disabled>- Bulan -</option>
                                    @foreach ($bulanData as $b)
                                        <option value="{{ $b->bulan }}"
                                            {{ request('bulan') == $b->bulan ? 'selected' : '' }}>
                                            {{ \Carbon\Carbon::createFromFormat('!m', $b->bulan)->translatedFormat('F') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Kode Rekening</th>
                                <th rowspan="2">Uraian</th>
                                <th rowspan="2">Anggaran</th>
                                <th colspan="2">Realisasi</th>
                                <th rowspan="2">Saldo Anggaran</th>
                                <th rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <td>GU</td>
                                <td>LS</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($realisasi as $index => $r)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $r->anggaran->KodeRekening->kode_rekening }}</td>
                                    <td>{{ $r->anggaran->kodeRekening->uraian }}</td>
                                    <td>Rp. {{ number_format($r->anggaran->nominal, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($r->realisasi_gu, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($r->realisasi_ls, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($r->saldo_anggaran, 0, ',', '.') }}</td>
                                    <td>
                                        {{-- @if ($r->KodeRekening->children->isEmpty()) --}}
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#inlineForm{{ $r->id }}"
                                            class="btn btn-warning rounded-circle"><i class="fa fa-edit"></i></button>
                                        {{-- @else
                                            -
                                        @endif --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
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
                <form action="{{ url('/realisasi/generate') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <label>Bulan</label>
                        <div class="form-group">
                            <select name="bulan" id="" class="form-control">
                                <option value="" selected disabled>-- Pilih Bulan --</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ old('bulan') == $i ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::createFromFormat('!m', $i)->translatedFormat('F') }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <label>Tahun</label>
                        <div class="form-group">
                            <select name="tahun" id="" class="form-control">
                                <option value="" selected disabled>-- Pilih Tahun</option>
                                @foreach ($tahun as $t)
                                    <option value="{{ $t->id }}">{{ $t->tahun }}</option>
                                @endforeach
                            </select>
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

    @foreach ($realisasi as $r)
        <div class="modal fade text-left" id="inlineForm{{ $r->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Ubah Data Anggaran</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="{{ url('realisasi/update/' . $r->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <label>Realisasi GU</label>
                            <div class="form-group">
                                <input type="number" placeholder="Realisasi GU" class="form-control"
                                    name="realisasi_gu" value="{{ $r->realisasi_gu }}">
                            </div>
                            <label>Realisasi LS</label>
                            <div class="form-group">
                                <input type="number" placeholder="Realisasi LS" class="form-control"
                                    name="realisasi_ls" value="{{ $r->realisasi_ls }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @push('js')
        <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
        <script>
            // Simple Datatable
            let table1 = document.querySelector('#table1');
            let dataTable = new simpleDatatables.DataTable(table1);
        </script>
    @endpush
</x-layout>
