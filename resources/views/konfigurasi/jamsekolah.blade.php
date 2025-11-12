@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Konfigurasi Jam Sekolah
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
                        <form action="/konfigurasi/updatejamsekolah" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <h3>Jam Masuk</h3>
                                            <div class="col-12">
                                                <div class="input-icon mb-3">
                                                    <span class="input-icon-addon">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-7"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12l-2 3" /><path d="M12 7v5" /></svg>
                                                    </span>
                                                    <input type="time" value="{{ $jamsekolah->jam_masuk ?? '' }}" id="jam_masuk" class="form-control" name="jam_masuk" placeholder="Jam Masuk Sekolah">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <h3>Jam Pulang</h3>
                                            <div class="col-12">
                                                <div class="input-icon mb-3">
                                                    <span class="input-icon-addon">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-4"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12l3 2" /><path d="M12 7v5" /></svg>
                                                    </span>
                                                    <input type="time" value="{{ $jamsekolah->jam_pulang ?? '' }}" id="jam_pulang" class="form-control" name="jam_pulang" placeholder="Jam Pulang Sekolah">
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