@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Konfigurasi Lokasi Sekolah
                </h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::get('warning'))
                            <div class="alert alert-warning">
                                {{ Session::get('warning') }}
                            </div>
                        @endif
                        <form action="/konfigurasi/updatelokasikantor" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <h3>Titik Longitude dan Titik Latitude</h3>
                                            <div class="col-12">
                                                <div class="input-icon mb-3">
                                                    <span class="input-icon-addon">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-current-location"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M12 12m-8 0a8 8 0 1 0 16 0a8 8 0 1 0 -16 0" /><path d="M12 2l0 2" /><path d="M12 20l0 2" /><path d="M20 12l2 0" /><path d="M2 12l2 0" /></svg>
                                                    </span>
                                                    <input type="text" value="{{ $lok_kantor->lokasi_sekolah }}" id="lokasi_sekolah" class="form-control" name="lokasi_sekolah" placeholder="Lokasi Kantor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <h3>Jarak Radius (Meter)</h3>
                                            <div class="col-12">
                                                <div class="input-icon mb-3">
                                                    <span class="input-icon-addon">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-radar-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M15.51 15.56a5 5 0 1 0 -3.51 1.44" /><path d="M18.832 17.86a9 9 0 1 0 -6.832 3.14" /><path d="M12 12v9" /></svg>
                                                    </span>
                                                    <input type="text" value="{{ $lok_kantor->radius }}" id="radius" class="form-control" name="radius" placeholder="Radius">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-reload"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.933 13.041a8 8 0 1 1 -9.925 -8.788c3.899 -1 7.935 1.007 9.425 4.747" /><path d="M20 4v5h-5" /></svg>
                                                    Perbarui Data
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection