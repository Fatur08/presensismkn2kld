@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Rekap Presensi Harian
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
                        <form action="/presensi/cetakrekapharian" method="POST" target="_blank">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-event"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M16 3l0 4" /><path d="M8 3l0 4" /><path d="M4 11l16 0" /><path d="M8 15h2v2h-2z" /></svg>
                                        </span>
                                        <input type="text" value="" id="tanggal" name="tanggal" class="form-control" placeholder="Masukkan Tanggal" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="kode_jurusan" id="kode_jurusan" class="form-select">
                                            <option value="">Pilih Jurusan</option>
                                            @foreach($jurusan as $j)
                                                <option value="{{ $j->kode_jurusan }}">{{ $j->nama_jurusan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="kelas" id="kelas" class="form-select">
                                            <option value="">Pilih Kelas</option>
                                            @foreach($kelas as $k)
                                                <option value="{{ $k->kelas }}">{{ $k->kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="bulan" id="bulan" class="form-select">
                                            <option value="">Pilih Bulan</option>
                                            @for ($i=1; $i <= 12; $i++)
                                            <option value="{{ $i }}" {{ date("m") == $i ? 'selected' : '' }}>{{ $namabulan[$i] }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="tahun" id="tahun" class="form-select">
                                            <option value="">Pilih Tahun</option>
                                            @php
                                            $tahunmulai = 2023;
                                            $tahunskrg = date("Y");
                                            @endphp
                                            @for ($tahun=$tahunmulai; $tahun <= $tahunskrg; $tahun++)
                                            <option value="{{ $tahun }}" {{ date("Y") == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-printer"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                                            Cetak
                                        </button>
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
@push('myscript')
<script>
    $(function(){
        $("#tanggal").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format:'yyyy-mm-dd'
        });

        $("#formcetakrekapharian").submit(function(){
            var nama_supplier = $("#nama_supplier").val();
            var alamat = $("#alamat").val();
            var no_hp = $("#no_hp").val();
            if(nama_supplier==""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Nama Supplier Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                  }).then(()=> {
                      $("#nama_supplier").focus();
                  });
                return false;
            } else if (alamat==""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Alamat Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                  }).then(()=> {
                      $("#alamat").focus();
                  });
                return false;
            } else if (no_hp==""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'No. HP Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                  }).then(()=> {
                      $("#no_hp").focus();
                  });
                return false;
            }
        });


        flatpickr("#tanggal", {
            dateFormat: "d F Y", // format tampilan: 15 September 2025
            altInput: true,
            altFormat: "d F Y",
            locale: "id" // biar bulan pakai bahasa Indonesia
        });
    });
</script>
@endpush