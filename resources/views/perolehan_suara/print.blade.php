<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @switch($title)
            @case('TPS')
                PEROLEHAN SUARA TPS SLEMAN PEMILU 2024
            @break

            @case('KELURAHAN')
                PEROLEHAN SUARA KELURAHAN SLEMAN PEMILU 2024
            @break

            @case('KECAMATAN')
                PEROLEHAN SUARA KECAMATAN SLEMAN PEMILU 2024
            @break

            @default
                PEROLEHAN SUARA DAPIL 6 SLEMAN PEMILU 2024
            @break
        @endswitch
    </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        p {
            text-align: center;
        }

        .header {
            position: relative;
            margin-bottom: 20px;
        }

        .print-date {
            position: absolute;
            right: 0;
            top: 0;
            font-size: 0.8em;
            color: #555;
        }

        .details {
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .no-data {
            text-align: center;
            font-style: italic;
            color: #888;
            padding: 20px;
        }

        .total-row {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <p class="print-date">Tanggal Print: {{ date('d F Y') }}</p>
        <p>
            @switch($title)
                @case('TPS')
                <p> PEROLEHAN SUARA TPS SLEMAN PEMILU 2024</p>
            @break

            @case('KELURAHAN')
                <p> PEROLEHAN SUARA KELURAHAN SLEMAN PEMILU 2024</p>
            @break

            @case('KECAMATAN')
                <p> PEROLEHAN SUARA KECAMATAN SLEMAN PEMILU 2024</p>
            @break

            @default
                <p> PEROLEHAN SUARA DAPIL 6 SLEMAN PEMILU 2024</p>
            @break
        @endswitch
        </p>
    </div>
    <div class="details">
        <div><strong>NAMA CALEG :</strong> {{ $caleg }}</div>
        <div><strong>PARTAI :</strong> {{ $partai }}</div>
        <div><strong>DAPIL :</strong> {{ $dapil }}</div>
        <div><strong>CALEG DPRD Kab/Kota :</strong> {{ $wilayah }}</div>
        <br>
        <div><strong>KECAMATAN :</strong> {{ $kecamatan ?: 'Keseluruhan' }}</div>
        <div><strong>KELURAHAN :</strong> {{ $kelurahan ?: 'Keseluruhan' }}</div>
        <div><strong>KODE TPS :</strong> {{ $kodeTps ?: 'Keseluruhan' }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>KODE TPS</th>
                <th>ALAMAT</th>
                <th>CATATAN</th>
                <th>JUMLAH SUARA</th>
            </tr>
        </thead>
        <tbody>
            @if ($data->isEmpty())
                <tr>
                    <td colspan="5" class="no-data">Tidak ada data yang tersedia.</td>
                </tr>
            @else
                @foreach ($data as $index => $perolehanSuara)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $perolehanSuara->kode_tps }}</td>
                        <td>{{ $perolehanSuara->tps->alamat_tps }}</td>
                        <td>{{ $perolehanSuara->catatan }}</td>
                        <td>{{ $perolehanSuara->jumlah_suara }}</td>
                    </tr>
                @endforeach
                <!-- Total Row -->
                <tr class="total-row">
                    <td colspan="4">TOTAL KESELURUHAN</td>
                    <td>{{ $data->sum('jumlah_suara') }}</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>

</html>
