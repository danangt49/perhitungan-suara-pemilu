<!DOCTYPE html>
<html>

<head>
    <title>POTENSIAL ALAMAT TPS SE-KABUPATEN SLEMAN PEMILU 2024</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
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
        }

        .no-data {
            text-align: center;
            font-style: italic;
            color: #888;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <p class="print-date">Tanggal Print: {{ date('d F Y') }}</p><br>
        <p>POTENSIAL ALAMAT TPS SE-KABUPATEN SLEMAN PEMILU 2024</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>KECAMATAN</th>
                <th>KELURAHAN</th>
                <th>NO. TPS</th>
                <th>ALAMAT</th>
            </tr>
        </thead>
        <tbody>
            @if ($data->isEmpty())
                <tr>
                    <td colspan="5" class="no-data">Tidak ada data yang tersedia.</td>
                </tr>
            @else
                @foreach ($data as $index => $tps)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $tps->kecamatan }}</td>
                        <td>{{ $tps->kelurahan }}</td>
                        <td>{{ $tps->no_tps }}</td>
                        <td>{{ $tps->alamat_tps }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>

</html>
