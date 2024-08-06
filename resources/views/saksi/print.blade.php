<!DOCTYPE html>
<html>

<head>
    <title>DATA SAKSI SE-KABUPATEN SLEMAN PEMILU 2024</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
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
        <p><strong>DATA SAKSI SE-KABUPATEN SLEMAN PEMILU 2024</strong></p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No KTP</th>
                <th>No HP</th>
                <th>Kode TPS</th>
                <th>Pendidikan</th>
                <th>Agama</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @if ($data->isEmpty())
                <tr>
                    <td colspan="9" class="no-data">Tidak ada data yang tersedia.</td>
                </tr>
            @else
                @foreach ($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat_tinggal }}</td>
                        <td>{{ $item->no_ktp }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->kode_tps }}</td>
                        <td>{{ $item->pendidikan }}</td>
                        <td>{{ $item->agama }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
</body>

</html>
