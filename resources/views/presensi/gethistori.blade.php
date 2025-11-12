<?php
require '../vendor/autoload.php';// Autoload semua library composer
use Carbon\Carbon;
\Carbon\Carbon::setLocale('id');
?>
@if($histori->isEmpty())
<div class="alert alert-outline-warning">
    <p>Data Belum Ada</p>
</div>
@endif
<ul class="listview image-listview">
    @php
        $no = 1;
    @endphp
    <style>
    th {
            font-size: 13px;
            text-align: center;
        }
    td {
        font-size: 13px;
        text-align: center;
    }
    </style>
    <table style="width: 100%;">
        <tr>
            <th>No.</th>
            <th>Hari / Tgl</th>
            <th>Jam Masuk</th>
            <th>Jam Pulang</th>
            <th>Keterangan</th>
        </tr>
        @foreach ($histori as $d)
        <tr>
            <td>{{ $no++ }}</td>
            <td>
                <div>{{ \Carbon\Carbon::parse($d->tgl_presensi)->translatedFormat('l') }}</div>
                <div>{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</div>
            </td>
            <td>
                <span class="bagde {{ $d->jam_in < $jamMasuk ? 'bg-success' : 'bg-danger' }}">
                    {{ $d->jam_in }}
                </span>
            </td>
            <td>
                <span class="badge {{ $d->jam_out != null && $d->jam_out >= $jamPulangAsli && $d->jam_out <= $jamPulangBatas ? 'bg-success' : 'bg-danger' }}">
                    {{ $d->jam_out != null ? $d->jam_out : 'Belum Absen' }}
                </span>
            </td>
            @php
                $jamIn = $d->jam_in;
                $jamOut = $d->jam_out;
                $tglPresensi = $d->tgl_presensi;

                $jamMasuk = '07:30:00'; // jam masuk maksimal
                $jamPulangBatas = '16:05:00'; // batas pulang, lewat ini dianggap bolos

                $isTerlambat = $jamIn && $jamIn > $jamMasuk;

                // Buat tanggal presensi lengkap dengan jam pulang batas (contoh: 2025-06-02 16:05:00)
                $batasWaktuPulang = Carbon::parse($tglPresensi . ' ' . $jamPulangBatas);

                // Bandingkan waktu sekarang sudah lewat batas dan jam_out masih kosong
                $isBolos = $jamIn && !$jamOut && now()->greaterThan($batasWaktuPulang);
            @endphp

            @if($jamIn && $jamOut)
                {{-- Hadir atau Terlambat --}}
                <td>
                    @if($isTerlambat)
                        <span class="badge bg-primary">Hadir (Telat)</span>
                    @else
                        <span class="badge bg-success">Hadir</span>
                    @endif
                </td>
            @elseif($isBolos)
                <td>
                    <span class="badge bg-danger">Bolos</span>
                </td>
            @else
                <td></td>
            @endif
        </tr>
        @endforeach
        <tr>
            <td colspan="5">-</td>
        </tr>
        <tr>
            <td colspan="5">-</td>
        </tr>
        <tr>
            <td colspan="5">-</td>
        </tr>
    </table>
</ul>