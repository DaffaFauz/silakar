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
                        data-bs-target="#inlineForm"><i class="fa fa-plus"></i> Tambah Data</button>
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
                            <?php $no = 1; ?>
                            @foreach ($kodrek as $k)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $k->kode_rekening5 }}</td>
                                    <td>{{ $k->uraian }}</td>
                                    <td> <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#inlineForm{{ $k->id }}"
                                            class="btn btn-warning rounded-circle"><i class="fa fa-edit"></i></button><a
                                            href="" class="btn btn-danger rounded-circle"><i
                                                class="fa fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Graiden</td>
                                <td>vehicula.aliquet@semconsequat.co.uk</td>
                                <td>076 4820 8838</td>
                                <td><a href="" class="btn btn-warning rounded-circle"><i
                                            class="fa fa-edit"></i></a><a href=""
                                        class="btn btn-danger rounded-circle"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Dale</td>
                                <td>fringilla.euismod.enim@quam.ca</td>
                                <td>0500 527693</td>
                                <td><a href="" class="btn btn-warning rounded-circle"><i
                                            class="fa fa-edit"></i></a><a href=""
                                        class="btn btn-danger rounded-circle"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Nathaniel</td>
                                <td>mi.Duis@diam.edu</td>
                                <td>(012165) 76278</td>
                                <td><a href="" class="btn btn-warning rounded-circle"><i
                                            class="fa fa-edit"></i></a><a href=""
                                        class="btn btn-danger rounded-circle"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Darius</td>
                                <td>velit@nec.com</td>
                                <td>0309 690 7871</td>
                                <td><a href="" class="btn btn-warning rounded-circle"><i
                                            class="fa fa-edit"></i></a><a href=""
                                        class="btn btn-danger rounded-circle"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Oleg</td>
                                <td>rhoncus.id@Aliquamauctorvelit.net</td>
                                <td>0500 441046</td>
                                <td><a href="" class="btn btn-warning rounded-circle"><i
                                            class="fa fa-edit"></i></a><a href=""
                                        class="btn btn-danger rounded-circle"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Kermit</td>
                                <td>diam.Sed.diam@anteVivamusnon.org</td>
                                <td>(01653) 27844</td>
                                <td><a href="" class="btn btn-warning rounded-circle"><i
                                            class="fa fa-edit"></i></a><a href=""
                                        class="btn btn-danger rounded-circle"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Jermaine</td>
                                <td>sodales@nuncsit.org</td>
                                <td>0800 528324</td>
                                <td><a href="" class="btn btn-warning rounded-circle"><i
                                            class="fa fa-edit"></i></a><a href=""
                                        class="btn btn-danger rounded-circle"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Ferdinand</td>
                                <td>gravida.molestie@tinciduntadipiscing.org</td>
                                <td>(016977) 4107</td>
                                <td><a href="" class="btn btn-warning rounded-circle"><i
                                            class="fa fa-edit"></i></a><a href=""
                                        class="btn btn-danger rounded-circle"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Kuame</td>
                                <td>Quisque.purus@mauris.org</td>
                                <td>(0151) 561 8896</td>
                                <td><a href="" class="btn btn-warning rounded-circle"><i
                                            class="fa fa-edit"></i></a><a href=""
                                        class="btn btn-danger rounded-circle"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Deacon</td>
                                <td>Duis.a.mi@sociisnatoquepenatibus.com</td>
                                <td>07740 599321</td>
                                <td><a href="" class="btn btn-warning rounded-circle"><i
                                            class="fa fa-edit"></i></a><a href=""
                                        class="btn btn-danger rounded-circle"><i class="fa fa-trash"></i></a></td>
                            </tr>
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
                <form action="/tambahsubkodrek5" method="post">
                    @csrf
                    <div class="modal-body">
                        <label>Kode Rekening</label>
                        <div class="form-group">
                            <input type="text" placeholder="Kode Rekening" class="form-control" name="kodrek5">
                        </div>
                        <label>Uraian</label>
                        <div class="form-group">
                            <input type="text" placeholder="Uraian" class="form-control" name="uraian">
                        </div>
                        <label>Kodrek 4</label>
                        <div class="form-group">
                            <input type="text" placeholder="Induk Kode Rekening" class="form-control"
                                name="kodrek4">
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
    @foreach ($kodrek as $kk)
        <div class="modal fade text-left" id="inlineForm{{ $kk->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Ubah Data Kode Rekening</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <label>Kode Rekening</label>
                            <div class="form-group">
                                <input type="text" placeholder="Kode Rekening" class="form-control"
                                    value="{{ $kk->kode_rekening }}">
                            </div>
                            <label>Uraian</label>
                            <div class="form-group">
                                <input type="text" placeholder="Uraian" class="form-control"
                                    value="{{ $kk->uraian }}">
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
        </div>
    @endforeach



    @push('js')
        <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
        <script>
            // Simple Datatable
            let table1 = document.querySelector('#table1');
            let dataTable = new simpleDatatables.DataTable(table1);
        </script>
    @endpush
</x-layout>
