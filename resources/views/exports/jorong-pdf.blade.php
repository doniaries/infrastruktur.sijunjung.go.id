<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Jorong - Kabupaten Sijunjung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
        .header h2 {
            margin: 5px 0 0 0;
            font-size: 14px;
            color: #666;
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
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
            font-weight: bold;
            text-align: center;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #666;
        }
        .no-data {
            text-align: center;
            padding: 40px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DATA JORONG</h1>
        <h2>Kabupaten Sijunjung, Provinsi Sumatera Barat</h2>
    </div>

    <div class="info">
        <p><strong>Total Data:</strong> {{ $totalData }} Jorong</p>
        <p><strong>Tanggal Export:</strong> {{ date('d F Y, H:i') }} WIB</p>
        @if($filters['search'])
            <p><strong>Filter Pencarian:</strong> "{{ $filters['search'] }}"</p>
        @endif
        @if($filters['nagariFilter'])
            <p><strong>Filter Nagari:</strong> {{ $jorongs->first()?->nagari?->nama_nagari ?? 'Tidak diketahui' }}</p>
        @endif
        @if($filters['kecamatanFilter'])
            <p><strong>Filter Kecamatan:</strong> {{ $jorongs->first()?->nagari?->kecamatan?->nama ?? 'Tidak diketahui' }}</p>
        @endif
    </div>

    @if($jorongs->count() > 0)
        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="20%">Nama Jorong</th>
                    <th width="20%">Nagari</th>
                    <th width="15%">Kecamatan</th>
                    <th width="20%">Kepala Jorong</th>
                    <th width="10%">Penduduk</th>
                    <th width="10%">Luas (Ha)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jorongs as $index => $jorong)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $jorong->nama_jorong }}</td>
                        <td>{{ $jorong->nagari?->nama_nagari ?? '-' }}</td>
                        <td>{{ $jorong->nagari?->kecamatan?->nama ?? '-' }}</td>
                        <td>{{ $jorong->nama_kepala_jorong ?? '-' }}</td>
                        <td class="text-right">{{ number_format($jorong->jumlah_penduduk_jorong, 0, ',', '.') }}</td>
                        <td class="text-right">{{ number_format($jorong->luas_jorong, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">
            <p><strong>Tidak ada data jorong yang ditemukan</strong></p>
            <p>Silakan periksa filter pencarian atau coba lagi</p>
        </div>
    @endif

    <div class="footer">
        <p>Dokumen ini digenerate secara otomatis oleh Sistem Infrastruktur TI Sijunjung</p>
        <p>{{ url('/') }}</p>
    </div>
</body>
</html>