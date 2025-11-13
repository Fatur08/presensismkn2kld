<?php
use Carbon\Carbon;
\Carbon\Carbon::setLocale('id');
?>
@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Halaman
                </div>
                <h2 class="page-title">
                    Dashboard
                </h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container py-4">
        <!-- Tanggal Hari Ini -->
        <div class="row mb-4">
            <div class="col text-right">
                <h3>
                    {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                </h3>
            </div>
        </div>

        <!-- Baris 1: Hadir, Terlambat, Bolos (tengah) -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body bg-success text-white">
                        <h2>
                            {{ $rekappresensi -> jmlhadir != null ? $rekappresensi->jmlhadir : 0}}
                        </h2>
                        <h2 class="card-text">Murid Hadir</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body bg-danger text-white">
                        <h2>
                            {{ $rekappresensi -> jmlterlambat != null ? $rekappresensi->jmlterlambat : 0}}
                        </h2>
                        <h2 class="card-text">Murid Terlambat</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body text-white" style="background-color: #6f42c1;">
                        <h2>
                            {{ $rekappresensi -> jmlbolos != null ? $rekappresensi->jmlbolos : 0}}
                        </h2>
                        <h2 class="card-text">Murid Bolos</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Baris 2: Izin & Sakit (tengah) -->
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body bg-info text-white">
                        <h2>
                            {{ $rekapizin -> jmlizin != null ? $rekapizin->jmlizin : 0 }}
                        </h2>
                        <h2 class="card-text">Murid Izin</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body bg-warning text-white">
                        <h2>
                            {{ $rekapizin -> jmlsakit != null ? $rekapizin->jmlsakit : 0 }}
                        </h2>
                        <h2 class="card-text">Murid Sakit</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection