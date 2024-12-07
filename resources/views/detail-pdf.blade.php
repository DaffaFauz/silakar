<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid black;
            padding: 5px;
        }

        .text-center {
            text-align: center;
        }

        .text-justify {
            text-align: justify;
        }
    </style>
</head>

<body>
    <div class="header">
        <h3>ALOKASI PENCAIRAN BIAYA<BR>BELANJA LANGSUNG PUSKESMAS CICALENGKA TAHUN ANGGARAN {{ $tahun->tahun }}<br>BULAN
            {{ strtoupper($namaBulan) }} {{ $tahun->tahun }}</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th rowspan="2">Kode Rekening</th>
                <th rowspan="2">Uraian</th>
                <th rowspan="2">Anggaran</th>
                <th rowspan="2">Realisasi s/d Bulan Lalu</th>
                <th colspan="2">Realisasi</th>
                <th rowspan="2">Realisasi s/d Bulan Ini</th>
                <th rowspan="2">Persentase Anggaran</th>
                <th rowspan="2">Saldo Anggaran</th>
            </tr>
            <tr>
                <td>GU</td>
                <td>LS</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
                <tr>
                    <td>{{ $detail['kode_rekening'] }}</td>
                    <td>{{ $detail['uraian'] }}</td>
                    <td>Rp. {{ number_format($detail['anggaran'], 2) }}</td>
                    <td>
                        {{ is_numeric($detail['realisasi_sd_bulan_lalu']) ? 'Rp.' . number_format($detail['realisasi_sd_bulan_lalu'], 2) : $detail['realisasi_sd_bulan_lalu'] }}
                    </td>
                    <td class="text-justify">Rp. {{ number_format($detail['realisasi_gu'], 2) }}</td>
                    <td class="text-justify">Rp. {{ number_format($detail['realisasi_ls'], 2) }}</td>
                    <td class="text-justify">Rp. {{ number_format($detail['realisasi_sd_bulan_ini'], 2) }}</td>
                    <td class="text-center">{{ $detail['persentase_anggaran'] }}%</td>
                    <td class="text-justify">Rp. {{ number_format($detail['saldo_anggaran'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
