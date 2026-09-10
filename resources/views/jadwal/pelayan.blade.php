<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelayanan Ibadah GPPC</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
            border-bottom: 2px solid #eaeaea;
            padding-bottom: 15px;
        }
        .header img {
            max-height: 70px;
            width: auto;
        }
        .header h2 {
            margin: 0;
            color: #2c3e50;
            font-size: 24px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        /* Mengatur agar teks di dalam tabel menjadi rata tengah secara umum */
        th, td {
            border: 1px solid #dee2e6;
            padding: 12px 15px;
            text-align: center; 
            vertical-align: middle; 
            font-size: 14px;
        }
        th {
            background-color: #2c3e50;
            color: white;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .note-box {
            margin-top: 30px;
            background: #fff3cd;
            border: 1px solid #ffeeba;
            padding: 20px;
            border-radius: 6px;
            color: #856404;
        }
        .note-box h4 {
            margin: 0 0 10px 0;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header dengan Logo dan Judul -->
        <div class="header">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Gereja">
            <div>
                <h2>Jadwal Pelayanan Ibadah Raya GPPC</h2>
                <p style="margin: 5px 0 0 0; color: #7f8c8d; font-size: 14px;">Gereja Pouk Pelni Cimanggis</p>
            </div>
        </div>

        <!-- Tabel Jadwal -->
        <table>
            <thead>
                <tr>
                    <!-- Tambahkan style width di sini agar kolom tanggal lebih lebar -->
                    <th style="width: 150px;">Tanggal</th>
                    <th>WL</th>
                    <th>Singer</th>
                    <th>Pemusik</th>
                    <th>OHP</th>
                    <th>Doa</th>
                    <th>Warta</th>
                    <th>Kolektan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwals as $item)
                    <tr>
                        <!-- Tambahkan white-space: nowrap agar tanggal tidak turun ke baris baru -->
                        <td style="white-space: nowrap; text-align: center;">{{ $item->tanggal }}</td>
                        <td>{{ $item->wl ?? '-' }}</td>
                        <td style="white-space: pre; text-align: left; padding-left: 20px;">{!! $item->singer ?? '-' !!}</td>
                        <td style="white-space: pre; text-align: left; padding-left: 20px;">{!! $item->pemusik ?? '-' !!}</td>
                        <td>{{ $item->ohp ?? '-' }}</td>
                        <td>{{ $item->doa ?? '-' }}</td>
                        <td>{{ $item->warta ?? '-' }}</td>
                        <td>{{ $item->kolektan ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align: center; color: #7f8c8d;">Belum ada jadwal pelayanan yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Catatan Umum untuk Pelayan -->
        <div class="note-box">
            <h4>📌 Catatan / Pengumuman untuk Para Pelayan:</h4>
            <p style="margin: 0; line-height: 1.6;">
                Harap para pelayan ibadah hadir 30 menit sebelum ibadah dimulai untuk persiapan dan doa bersama. Tuhan Yesus Memberkati!
            </p>
        </div>
    </div>

</body>
</html>