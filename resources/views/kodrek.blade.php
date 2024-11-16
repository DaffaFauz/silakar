<x-layout>
    @push('css')
        <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    @endpush

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>DataTable</h3>
                    <p class="text-subtitle text-muted">For user to check they list</p>
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif ($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Data Kode Rekening
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#inlineForm"><i class="fa fa-plus"></i> Tambah Data
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Rekening</th>
                                <th>Uraian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = [1]; ?>
                            @foreach ($kodeRekenings as $k)
                                @include('components.kodrek_row', [
                                    'kodeRekening' => $k,
                                    'no' => $no,
                                ])
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
                    <h4 class="modal-title" id="myModalLabel33">Tambah Kode Rekening</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="kodrek/tambah" method="post">
                    @csrf
                    <div class="modal-body">
                        <label>Kode Rekening</label>
                        <div class="form-group">
                            <input type="text" placeholder="Kode Rekening"
                                class="form-control @error('kode_rekening') is-invalid @enderror " name="kode_rekening"
                                value="{{ old('kodrek') }}" required>
                            @error('kode_rekening')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label>Uraian</label>
                        <div class="form-group">
                            <input type="text" placeholder="Uraian" class="form-control @error('uraian') @enderror"
                                name="uraian" required value="{{ old('uraian') }}">
                            @error('uraian')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- @foreach ($kodeRekenings as $kk) --}}
    <div class="modal fade text-left" id="inlineFormedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Ubah Data Kode Rekening</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form id="formUbahKodeRekening" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <label>Kode Rekening</label>
                        <div class="form-group">
                            <input type="text" placeholder="Kode Rekening" id="editKodeRekening"
                                class="form-control @error('kode_rekening') @enderror" name="kode_rekening" required>
                            @error('kode_rekening')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label>Uraian</label>
                        <div class="form-group">
                            <input type="text" placeholder="Uraian" id="editUraian"
                                class="form-control @error('uraian') @enderror" name="uraian" required>
                            @error('uraian')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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


    <div class="modal fade text-left" id="inlineFormadd" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Data Sub Kode Rekening</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form id="formTambahSub" action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="parent_id" value="">
                        <label>Sub Kode Rekening</label>
                        <div class="form-group">
                            <input type="text" placeholder="Kode Rekening"
                                class="form-control @error('kode_rekening') @enderror" name="kode_rekening" required>
                            @error('kode_rekening')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label>Uraian</label>
                        <div class="form-group">
                            <input type="text" placeholder="Uraian"
                                class="form-control @error('uraian') @enderror" name="uraian" required>
                            @error('uraian')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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



    @push('js')
        <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
        <script>
            // Simple Datatable
            let table1 = document.querySelector('#table1');
            let dataTable = new simpleDatatables.DataTable(table1);
        </script>
        <script>
            function hapus(id) {
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Data berhasil dihapus!",
                            icon: "success",
                            showConfirmButton: false,
                        });
                        $('.hapus').submit()
                    }
                });
            }
        </script>
        <script>
            document.addEventListener('click', function(e) {
                // Event delegation untuk tombol Tambah Sub
                if (e.target.classList.contains('btn-tambah-sub')) {
                    const currentId = e.target.dataset.id; // Ambil ID
                    const form = document.querySelector('#formTambahSub'); // Selektor form
                    const parentIdField = form.querySelector('input[name="parent_id"]'); // Selektor input hidden

                    // Debugging
                    console.log('Current ID:', currentId);

                    if (form) {
                        // Perbarui action pada form
                        form.action = `/kodrek/tambahsub/${currentId}`;
                        console.log('Form action set to:', form.action);

                        // Set nilai parent_id
                        if (parentIdField) {
                            parentIdField.value = currentId;
                            console.log('Parent ID set to:', parentIdField.value);
                        } else {
                            console.error('Input parent_id tidak ditemukan di form.');
                        }
                    } else {
                        console.error('Form #formTambahSub tidak ditemukan.');
                    }
                }
            });
        </script>
        <script>
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('btn-ubah')) {
                    const id = e.target.dataset.id;
                    const kodeRekening = e.target.dataset.kode;
                    const uraian = e.target.dataset.uraian;

                    const form = document.querySelector('#formUbahKodeRekening');
                    const inputKodeRekening = document.querySelector('#editKodeRekening');
                    const inputUraian = document.querySelector('#editUraian');

                    // Update action URL pada form
                    form.action = `/kodrek/ubah/${id}`;

                    // Isi data ke input
                    inputKodeRekening.value = kodeRekening;
                    inputUraian.value = uraian;
                }
            });
        </script>
    @endpush
</x-layout>
