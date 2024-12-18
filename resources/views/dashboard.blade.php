<x-layout>
    <div class="page-heading">
        <h3>Statistik Anggaran</h3>
    </div>
    <div class="page-content">
        <section class="row">
            @if (is_null($tahunAktif))
                <div class="alert alert-warning">
                    <strong>Perhatian:</strong> Tahun aktif {{ now()->year }} belum ditambahkan dalam sistem. Mohon
                    masukkan Tahun pada halaman Anggaran
                </div>
            @else
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Anggaran Tahun Ini</h6>
                                            <h6 class="font-extrabold mb-0">Rp. {{ number_format($totalAnggaran) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Anggaran Terealisasi</h6>
                                            <h6 class="font-extrabold mb-0">Rp. {{ number_format($totalRealisasi) }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Persentase Realisasi Anggaran</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-visitors-profile"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
    </div>

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            let optionsVisitorsProfile = {
                series: [{{ $totalAnggaran }}, {{ $totalRealisasi }}],
                labels: ["Anggaran", "Anggaran Terealisasi"],
                colors: ["#435ebe", "#55c6e8"],
                chart: {
                    type: "donut",
                    width: "100%",
                    height: "350px",
                },
                legend: {
                    position: "bottom",
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "30%",
                        },
                    },
                },
            };

            var chartVisitorsProfile = new ApexCharts(
                document.getElementById("chart-visitors-profile"),
                optionsVisitorsProfile
            );
            chartVisitorsProfile.render();
        </script>
    @endpush
</x-layout>
