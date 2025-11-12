<?php
require '../vendor/autoload.php';// Autoload semua library composer
use Carbon\Carbon;
\Carbon\Carbon::setLocale('id');
?>
@extends('layouts.presensi')
@section('content')
<style>
    .logout {
        position: absolute;
        color: white;
        font-size: 30px;
        text-decoration: none;
        right: 8px;
    }

    .logout:hover {
        color: white;
    }
</style>
<!-- App Capsule -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="appCapsule">
    <div class="section" id="user-section">
        <a href="/proseslogout" class="logout">
            <ion-icon name="exit-outline"></ion-icon>
        </a>
        <div id="user-detail" style="display: flex; align-items: center;">
            <div class="avatar" style="margin-right: 10px;">
                @if(Auth::guard('murid')->user()->foto)
                    @php
                        $path = Storage::url('uploads/murid/'.Auth::guard('murid')->user()->foto);
                    @endphp
                    <img src="{{ url($path) }}" alt="avatar" class="imaged" style="width: 2cm; height: 2cm; object-fit: cover; border-radius: 8px;">
                @else
                    <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w64 rounded">
                @endif
            </div>
            <div id="user-info" style="display: flex; flex-direction: column; justify-content: center; line-height: 1.3;">
                <h3 id="user-name" style="margin: 0; font-size: 1rem;">{{ $murid->nama_lengkap }}</h3>
                <h4 id="user-class" style="margin: 0; font-size: 1rem; color: #f0f0f0;">{{ $murid->kelas }}</h4>
                <span id="user-role" style="font-size: 0.85rem; color: #f0f0f0;">{{ $murid->nama_jurusan ?? 'Jurusan Tidak Ditemukan' }}</span>
            </div>
        </div>
    </div>
    <div class="section" id="menu-section">
        <div class="card">
            <div class="card-body text-center">
                <div class="list-menu">
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="/editprofile" class="green" style="font-size: 40px;">
                                <ion-icon name="person-sharp"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Profil</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="/presensi/izin" class="danger" style="font-size: 40px;">
                                <ion-icon name="calendar-number"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Izin</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="/presensi/histori" class="warning" style="font-size: 40px;">
                                <ion-icon name="document-text"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Histori</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section mt-2" id="presence-section">
        <div class="todaypresence">
            <div class="row">
                <div class="col-6">
                    <div class="card gradasigreen">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Absen Masuk</h4>
                                    <span>{{ $presensihariini != null ? $presensihariini->jam_in : 'Belum Absen' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card gradasired">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Absen Pulang</h4>
                                    <span>{{ $presensihariini != null && $presensihariini->jam_out != null ? $presensihariini->jam_out : 'Belum Absen' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="rekappresensi">
            <h3>Rekap Presensi Bulan {{ $namabulan[$bulanini] }} Tahun {{ $tahunini }}</h3>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 12px 12px !important; line-height:0.8rem">
                            <span class="badge bg-danger" style="position: absolute; top:3px; right:10px; font-size:0.6rem; z-index:999;">{{ $rekappresensi->jmlhadir }}</span>
                            <ion-icon name="accessibility-outline" style="font-size: 1.6rem" class="text-primary mb-1"></ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; font-weight:500">Hadir</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 12px 12px !important; line-height:0.8rem">
                            <span class="badge bg-danger" style="position: absolute; top:3px; right:10px; font-size:0.6rem; z-index:999;">{{ $rekapizin->jmlizin }}</span>
                            <ion-icon name="newspaper-outline" style="font-size: 1.6rem" class="text-success mb-1"></ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; font-weight:500">Izin</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 12px 12px !important; line-height:0.8rem">
                            <span class="badge bg-danger" style="position: absolute; top:3px; right:10px; font-size:0.6rem; z-index:999;">{{ $rekapizin->jmlsakit }}</span>
                            <ion-icon name="medkit-outline" style="font-size: 1.6rem" class="text-warning mb-1"></ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; font-weight:500">Sakit</span>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 12px 12px !important; line-height:0.8rem">
                            <span class="badge bg-danger" style="position: absolute; top:3px; right:10px; font-size:0.6rem; z-index:999;">{{ $rekappresensi->jmlterlambat }}</span>
                            <ion-icon name="alarm-outline" style="font-size: 1.6rem" class="text-danger mb-1"></ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; font-weight:500">Telat</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="presencetab mt-2">
            <div class="tab-pane fade show active" id="pilled" role="tabpanel">
                <ul class="nav nav-tabs style1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                            Bulan Ini
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                            Hari ini
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content mt-2" style="margin-bottom:100px;">
                <div class="tab-pane fade show active" id="home" role="tabpanel">
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
                            </tr>
                            @foreach ($historibulanini as $d)
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
                            </tr>
                            @endforeach
                        </table>
                    </ul>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel">
                    <ul class="listview image-listview">
                        @php
                            $no = 1;
                        @endphp
                        <style>
                        th {
                                font-size: 13px;
                                text-align: center;
                            }
                        </style>
                        <table style="width: 100%;">
                            <tr>
                                <th>No.</th>
                                <th>Nama Murid</th>
                                <th>Jam Masuk</th>
                            </tr>
                            @foreach ($leaderboard as $d)
                            <tr>
                                <td style="text-align: center; vertical-align: top; font-size: 13px;">{{ $no++ }}</td>
                                <td style="text-align: left; font-size: 13px;">
                                    <div>
                                        <b>{{ $d->nama_lengkap }}</b><br>
                                        <small class="text-muted">{{ $d->kelas }} {{ $d->kode_jurusan }}</small>
                                    </div>
                                </td>
                                <td style="text-align: center; font-size: 13px;">
                                    <span class="bagde {{ $d->jam_in < $jamMasuk ? 'bg-success' : 'bg-danger' }}">
                                        {{ $d->jam_in }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * App Capsule -->
@endsection