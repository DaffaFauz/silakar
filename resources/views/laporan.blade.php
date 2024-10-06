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
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#inlineForm"><i class="fa fa-print"></i> Cetak Laporan</button>
                </div>
                <div class="d-flex justify-content-start">

                    <div class="col-2 ms-4">
                        <select name="" id="" class="form-control">
                            <option value=""disabled selected>Bulan</option>
                            <option value="">Januari</option>
                            <option value="">Juli</option>
                            <option value="">Februari</option>
                            <option value="">Februari</option>
                            <option value="">Februari</option>
                        </select>
                    </div>
                    <div class="col-2 ms-4">
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
                                <th rowspan="2">No</th>
                                <th rowspan="2">Uraian</th>
                                <th rowspan="2">Anggaran</th>
                                <th rowspan="2">Realisasi Bulan Lalu</th>
                                <th colspan="2">Realisasi Bulan Ini</th>
                                <th rowspan="2">Realisasi S/D Bulan Ini</th>
                                <th rowspan="2">%</th>
                                <th rowspan="2">Saldo Anggaran</th>
                            </tr>
                            <tr>
                                <th>GU</th>
                                <th>LS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Januari</td>
                                <td>Rp. 450.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
                            </tr>
                            <tr>
                                <td>Dale</td>
                                <td>fringilla.euismod.enim@quam.ca</td>
                                <td>Lorem ipsum dolor sit.</td>
                                <td>0500 527693</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 150.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
                            </tr>
                            <tr>
                                <td>Nathaniel</td>
                                <td>mi.Duis@diam.edu</td>
                                <td>Lorem ipsum dolor sit.</td>
                                <td>(012165) 76278</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 150.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
                            </tr>
                            <tr>
                                <td>Darius</td>
                                <td>velit@nec.com</td>
                                <td>Lorem ipsum dolor sit.</td>
                                <td>0309 690 7871</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 150.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
                            </tr>
                            <tr>
                                <td>Oleg</td>
                                <td>rhoncus.id@Aliquamauctorvelit.net</td>
                                <td>Lorem ipsum dolor sit.</td>
                                <td>0500 441046</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 150.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
                            </tr>
                            <tr>
                                <td>Kermit</td>
                                <td>diam.Sed.diam@anteVivamusnon.org</td>
                                <td>Lorem ipsum dolor sit.</td>
                                <td>(01653) 27844</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 150.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
                            </tr>
                            <tr>
                                <td>Jermaine</td>
                                <td>sodales@nuncsit.org</td>
                                <td>Lorem ipsum dolor sit.</td>
                                <td>0800 528324</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 150.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
                            </tr>
                            <tr>
                                <td>Ferdinand</td>
                                <td>gravida.molestie@tinciduntadipiscing.org</td>
                                <td>Lorem ipsum dolor sit.</td>
                                <td>(016977) 4107</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 150.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
                            </tr>
                            <tr>
                                <td>Kuame</td>
                                <td>Quisque.purus@mauris.org</td>
                                <td>Lorem ipsum dolor sit.</td>
                                <td>(0151) 561 8896</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 150.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
                            </tr>
                            <tr>
                                <td>Deacon</td>
                                <td>Duis.a.mi@sociisnatoquepenatibus.com</td>
                                <td>Lorem ipsum dolor sit.</td>
                                <td>07740 599321</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 150.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
                            </tr>
                            <tr>
                                <td>Channing</td>
                                <td>tempor.bibendum.Donec@ornarelectusante.ca</td>
                                <td>Lorem ipsum dolor sit.</td>
                                <td>0845 46 49</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 150.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
                            </tr>
                            <tr>
                                <td>Aladdin</td>
                                <td>sem.ut@pellentesqueafacilisis.ca</td>
                                <td>Lorem ipsum dolor sit.</td>
                                <td>0800 1111</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 150.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
                            </tr>
                            <tr>
                                <td>Cruz</td>
                                <td>non@quisturpisvitae.ca</td>
                                <td>Lorem ipsum dolor sit.</td>
                                <td>07624 944915</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 150.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
                            </tr>
                            <tr>
                                <td>Keegan</td>
                                <td>molestie.dapibus@condimentumDonecat.edu</td>
                                <td>Lorem ipsum dolor sit.</td>
                                <td>0800 200103</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 10.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
                            </tr>
                            <tr>
                                <td>Ray</td>
                                <td>placerat.eget@sagittislobortis.edu</td>
                                <td>Lorem ipsum dolor sit.</td>
                                <td>(0112) 896 6829</td>
                                <td>Rp. 200.000.000</td>
                                <td>Rp. 150.000.000</td>
                                <td>Rp. 200.000.000</td>
                                <td>40%</td>
                                <td>Rp. 150.000.000</td>
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
                    <h4 class="modal-title" id="myModalLabel33">Tambah Data Anggaran</h4>
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
                            <span class="d-none d-sm-block">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="inlineForm1" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
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
