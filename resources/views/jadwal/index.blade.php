<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Jadwal Pelayanan Ibadah</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, sans-serif; background: #f4f7f6; padding: 20px; }
        .container { max-width: 1200px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #2c3e50; margin-bottom: 25px; }
        .form-group { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px; margin-bottom: 20px; }
        label { font-weight: bold; color: #34495e; display: block; margin-bottom: 5px; font-size: 14px; }
        input[type="text"], input[type="date"], textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-family: inherit; font-size: 14px; }
        textarea { resize: vertical; }
        .btn-utama { background: #3498db; color: white; padding: 12px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-weight: bold; font-size: 16px; }
        .btn-edit { background: #f39c12; color: white; border: none; padding: 6px 12px; border-radius: 3px; cursor: pointer; font-weight: bold; text-decoration: none; display: inline-block; margin-bottom: 4px; }
        .btn-delete { background: #e74c3c; color: white; border: none; padding: 6px 12px; border-radius: 3px; cursor: pointer; font-weight: bold; }
        .btn-batal { background: #95a5a6; color: white; padding: 8px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-weight: bold; font-size: 14px; margin-top: 10px; text-decoration: none; display: block; text-align: center; }
        .table-responsive { overflow-x: auto; margin-top: 25px; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; vertical-align: middle; }
        th { background: #2c3e50; color: white; text-align: center; white-space: nowrap; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .multi-line { white-space: nowrap; }
        .nama-item { white-space: nowrap; }
    </style>
</head>
<body>

<div class="container">
    <!-- Header: Logo di kiri dan Judul Utama -->
    <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 25px; border-bottom: 2px solid #eaeaea; padding-bottom: 15px;">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Gereja" style="max-height: 70px; width: auto;">
        <div>
            <h2 style="margin: 0; color: #2c3e50; font-size: 22px;">
                {{ isset($jadwal) ? 'Edit Jadwal Pelayanan Ibadah' : 'Jadwal Pelayanan Ibadah Raya GPPC' }}
            </h2>
            <p style="margin: 5px 0 0 0; color: #7f8c8d; font-size: 14px;">Gereja Pouk Pelni Cimanggis</p> <!-- Sesuaikan nama gereja jika perlu -->
        </div>
    </div>

    <!-- HAPUS ATAU HILANGKAN baris <h2> lama yang ada di tengah form -->

    <form action="{{ isset($jadwal) ? route('jadwal.update', $jadwal->id) : route('jadwal.store') }}" method="POST">
        @csrf
        @if(isset($jadwal))
            @method('PUT')
        @endif

        <div class="form-group">
            <!-- (Form input tetap di sini) -->
            <div>
                <label>Tanggal Ibadah:</label>
                <input type="date" name="tanggal" value="{{ $jadwal->tanggal ?? old('tanggal') }}" required>
            </div>
            <div>
                <label>Worship Leader (WL):</label>
                <input type="text" name="wl" value="{{ $jadwal->wl ?? old('wl') }}" placeholder="Nama WL">
            </div>
            <div>
                <label>Singer:</label>
                <textarea name="singer" rows="2" placeholder="Maria Mamangkey, Thania Tameno">{{ $jadwal->singer ?? old('singer') }}</textarea>
            </div>
            <div>
                <label>Pemusik:</label>
                <textarea name="pemusik" rows="2" placeholder="Gitar: Virga, Keyboard: Raynold">{{ $jadwal->pemusik ?? old('pemusik') }}</textarea>
            </div>
            <div>
                <label>Multimedia / OHP:</label>
                <input type="text" name="ohp" value="{{ $jadwal->ohp ?? old('ohp') }}" placeholder="Nama Petugas OHP">
            </div>
            <div>
                <label>Petugas Doa:</label>
                <input type="text" name="doa" value="{{ $jadwal->doa ?? old('doa') }}" placeholder="Nama Petugas Doa">
            </div>
            <div>
                <label>Warta Jemaat:</label>
                <input type="text" name="warta" value="{{ $jadwal->warta ?? old('warta') }}" placeholder="Nama Pembaca Warta">
            </div>
            <div>
                <label>Kolektan:</label>
                <input type="text" name="kolektan" value="{{ $jadwal->kolektan ?? old('kolektan') }}" placeholder="Nama Kolektan">
            </div>
            <div style="grid-column: 1 / -1;">
                <label>Note / Catatan untuk Pelayan:</label>
                <textarea name="catatan" rows="3" placeholder="Contoh: Latihan pukul 07.00 pagi. Harap hadir tepat waktu.">{{ $jadwal->catatan ?? old('catatan') }}</textarea>
            </div>
        </div>
        
        <button type="submit" class="btn-utama">{{ isset($jadwal) ? 'Update Jadwal' : 'Simpan Jadwal' }}</button>
        @if(isset($jadwal))
            <a href="{{ url('/') }}" class="btn-batal">Batal Edit</a>
        @endif
    </form>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>WL</th>
                    <th>Singer</th>
                    <th>Pemusik</th>
                    <th>OHP</th>
                    <th>Doa</th>
                    <th>Warta</th>
                    <th>Kolektan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwalList as $item)
                <tr>
                    <td class="nama-item">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</td>
                    <td class="nama-item">{{ $item->wl ?? '-' }}</td>
                    <td style="white-space: pre;">{!! $item->singer ?? '-' !!}</td>
                    <td style="white-space: pre;">{!! $item->pemusik ?? '-' !!}</td>
                    <td class="nama-item">{{ $item->ohp ?? '-' }}</td>
                    <td class="nama-item">{{ $item->doa ?? '-' }}</td>
                    <td class="nama-item">{{ $item->warta ?? '-' }}</td>
                    <td class="nama-item">{{ $item->kolektan ?? '-' }}</td>
                    <td style="text-align: center; white-space: nowrap;">
                        <a href="{{ route('jadwal.edit', $item->id) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus jadwal ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" style="text-align: center;">Belum ada jadwal pelayanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>