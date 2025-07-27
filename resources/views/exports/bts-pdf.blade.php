<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data BTS - Kabupaten Sijunjung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
        .header h2 {
            margin: 5px 0;
            font-size: 14px;
            font-weight: normal;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        .no {
            text-align: center;
            width: 30px;
        }
        .center {
            text-align: center;
        }
        .small {
            font-size: 10px;
        }
        .no-data {
            text-align: center;
            font-style: italic;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DATA BASE TRANSCEIVER STATION (BTS)</h1>
        <h2>KABUPATEN SIJUNJUNG</h2>
    </div>

    <div class="info">
        <p><strong>Total Data:</strong> {{ $totalData }} BTS</p>
        <p><strong>Tanggal Cetak:</strong> {{ date('d/m/Y H:i:s') }}</p>
        
        @if($search || $operatorFilter || $kecamatanFilter || $teknologiFilter || $statusFilter)
            <p><strong>Filter yang Diterapkan:</strong></p>
            <ul>
                @if($search)
                    <li>Pencarian: "{{ $search }}"</li>
                @endif
                @if($operatorFilter)
                    <li>Operator: {{ $operators->where('id', $operatorFilter)->first()->nama_operator ?? 'Tidak diketahui' }}</li>
                @endif
                @if($kecamatanFilter)
                    <li>Kecamatan: {{ $kecamatans->where('id', $kecamatanFilter)->first()->nama ?? 'Tidak diketahui' }}</li>
                @endif
                @if($teknologiFilter)
                    <li>Teknologi: {{ $teknologiFilter }}</li>
                @endif
                @if($statusFilter)
                    <li>Status: {{ $statusFilter }}</li>
                @endif
            </ul>
        @endif
    </div>

    @if($bts->count() > 0)
        <table>
            <thead>
                <tr>
                    <th class="no">No</th>
                    <th>Operator</th>
                    <th>Kecamatan</th>
                    <th>Nagari</th>
                    <th>Alamat</th>
                    <th>Koordinat</th>
                    <th>Teknologi</th>
                    <th>Tahun</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bts as $index => $item)
                    <tr>
                        <td class="no">{{ $index + 1 }}</td>
                        <td>{{ $item->operator->nama_operator ?? '-' }}</td>
                        <td>{{ $item->kecamatan->nama ?? '-' }}</td>
                        <td>{{ $item->nagari->nama_nagari ?? '-' }}</td>
                        <td class="small">{{ $item->alamat ?? '-' }}</td>
                        <td class="small">{{ $item->titik_koordinat ?? '-' }}</td>
                        <td class="center">{{ $item->teknologi ?? '-' }}</td>
                        <td class="center">{{ $item->tahun_bangun ?? '-' }}</td>
                        <td class="center">{{ $item->status ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">
            <p>Tidak ada data BTS yang ditemukan.</p>
        </div>
    @endif
</body>
</html>