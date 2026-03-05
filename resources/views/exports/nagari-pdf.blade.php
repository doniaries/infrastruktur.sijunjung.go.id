<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Nagari - Kabupaten Sijunjung</title>
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
        <div style="margin-bottom: 10px;">
            <img src="{{ public_path('images/kabupaten-sijunjung.png') }}" alt="Logo Sijunjung" style="height: 60px;">
        </div>
        <h1 style="font-size: 16px; margin-bottom: 5px;">Pemerintah Kabupaten Sijunjung</h1>
        <h2 style="font-size: 14px; margin-bottom: 10px;">Dinas Komunikasi dan Informatika</h2>
        <div style="border-top: 1px solid #000; margin-bottom: 20px;"></div>
        
        <h1 style="font-size: 20px; font-weight: bold;">DATA BTS</h1>
        <div style="font-size: 12px; margin-top: 5px;">
            Total: {{ $totalData }} Nagari
        </div>
    </div>

    <div style="margin-bottom: 15px; background: #f9f9f9; padding: 10px; border-radius: 5px; font-size: 11px;">
        
        <ul style="margin: 5px 0 0 0; padding-left: 20px;">
            @if($filters['statusSinyalFilter'])
                <li>Status Sinyal: {{ $filters['statusSinyalFilter'] }}</li>
            @endif
            @if($kecamatanName)
                <li>Kecamatan: {{ $kecamatanName }}</li>
            @endif
            @if($filters['search'])
                <li>Pencarian: "{{ $filters['search'] }}"</li>
            @endif
            @if(!$filters['statusSinyalFilter'] && !$kecamatanName && !$filters['search'])
                <li>Menampilkan seluruh data nagari</li>
            @endif
        </ul>
    </div>

    @if($nagaris->count() > 0)
        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="20%">Nama Nagari</th>
                    <th width="15%">Kecamatan</th>
                    <th width="18%">Wali Nagari</th>
                    <th width="10%">Penduduk</th>
                    <th width="10%">Luas (Ha)</th>
                    @if($filters['statusSinyalFilter'] !== 'Blankspot')
                    <th width="8%">Jorong</th>
                    @endif
                    <th width="7%">BTS</th>
                    <th width="12%">Sinyal</th>
                </tr>
            </thead>
            <tbody>
                @php $hasRelatedWarning = false; @endphp
                @foreach($nagaris as $index => $nagari)
                    @php 
                        $isRelated = ($nagari->bts_count > 0 || $nagari->btsCovering()->exists());
                        if($isRelated) $hasRelatedWarning = true;
                    @endphp
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>
                            {{ $nagari->nama_nagari }}
                            @if($isRelated) <span style="color: red;">*</span> @endif
                        </td>
                        <td>{{ $nagari->kecamatan?->nama ?? '-' }}</td>
                        <td>{{ $nagari->nama_wali_nagari ?? '-' }}</td>
                        <td class="text-right">{{ number_format($nagari->jumlah_penduduk_nagari ?? 0, 0, ',', '.') }}</td>
                        <td class="text-right">{{ number_format($nagari->luas_nagari ?? 0, 0, ',', '.') }}</td>
                        @if($filters['statusSinyalFilter'] !== 'Blankspot')
                        <td class="text-center">{{ $nagari->jumlah_jorong }}</td>
                        @endif
                        <td class="text-center">{{ $nagari->bts_count ?? 0 }}</td>
                        <td class="text-center" style="font-size: 10px;">{{ $nagari->status_sinyal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if($hasRelatedWarning)
            <div style="margin-top: 10px; font-size: 10px; color: #666; font-style: italic;">
                <span style="color: red;">*</span> Nagari memiliki data infrastruktur BTS terkait (baik milik sendiri maupun cakupan dari nagari lain).
            </div>
        @endif
    @else
        <div class="no-data">
            <p><strong>Tidak ada data nagari yang ditemukan</strong></p>
            <p>Silakan periksa filter pencarian atau coba lagi</p>
        </div>
    @endif

    <div class="footer">
        <div style="float: left; text-align: left;">
            Exported on: {{ date('d/m/Y H:i') }} WIB
        </div>
        <div style="float: right;">
            Halaman 1 dari 1
        </div>
        <div style="clear: both; padding-top: 10px; text-align: center; border-top: 1px solid #eee; margin-top: 10px; font-size: 9px;">
            <p>Sistem Informasi Infrastruktur Teknologi Informasi Kabupaten Sijunjung</p>
        </div>
    </div>
</body>
</html>