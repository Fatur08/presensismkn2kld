@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row align-items-center justify-content-between">
            <div class="col-auto">
                <h2 class="page-title mb-0">
                    Monitoring Poin Pelanggaran
                </h2>
            </div>
            <div class="col-auto">
                <form action="/poin/informasi_poin" method="GET" target="_blank">
                    <button class="btn btn-primary" type="submit">
                        Informasi Pelanggaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="/poin" method="GET">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="input-icon mb-3">
                                                <span class="input-icon-addon">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                                                </span>
                                                <input type="text" value="{{ Request('nama_lengkap') }}" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="Nama Murid">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <select name="kelas" id="kelas" class="form-select">
                                                    <option value="">Kelas</option>
                                                    <option value="X" {{ request('kelas') == 'X' ? 'selected' : '' }}>Kelas X</option>
                                                    <option value="XI" {{ request('kelas') == 'XI' ? 'selected' : '' }}>Kelas XI</option>
                                                    <option value="XII" {{ request('kelas') == 'XII' ? 'selected' : '' }}>Kelas XII</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <select name="kode_jurusan" id="kode_jurusan" class="form-select">
                                                    <option value="">Jurusan</option>
                                                    @foreach ($jurusan as $d)
                                                        <option {{ Request('kode_jurusan')==$d->kode_jurusan ? 'selected' : '' }} value="{{ $d->kode_jurusan }}">{{ $d->nama_jurusan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <button class="btn btn-primary w-100" type="submit">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                                                    Cari Data
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style='text-align: center;'>No.</th>
                                            <th style='text-align: center;'>NISN</th>
                                            <th style='text-align: center;'>Nama</th>
                                            <th style='text-align: center;'>Kelas</th>
                                            <th style='text-align: center;'>Jurusan</th>
                                            <th style='text-align: center;'>Foto</th>
                                            <th style='text-align: center;'>No. HP</th>
                                            <th style='text-align: center;'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($murid as $d)
                                        @php
                                            $path = Storage::url('uploads/murid/'.$d->foto);
                                        @endphp
                                        <tr>
                                            <td style='text-align: center;'>{{ $loop->iteration + $murid->firstItem()-1 }}</td>
                                            <td>{{ str_pad($d->nisn, 10, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ $d->nama_lengkap }}</td>
                                            <td style='text-align: center;'>{{ $d->kelas }}</td>
                                            <td>{{ $d->nama_jurusan }}</td>
                                            <td style='text-align: center;'>
                                                @if (empty($d->foto))
                                                <img src="{{ asset('assets/img/nophoto.jpg') }}" class="avatar" alt="">
                                                @else
                                                <img src="{{ url($path) }}" class="avatar" alt="">
                                                @endif
                                            </td>
                                            <td>{{ $d->no_hp }}</td>
                                            <td style='text-align: center;'>
                                                <div class="btn-group">
                                                    <a href="/poin/{{ str_pad($d->nisn, 10, '0', STR_PAD_LEFT) }}/riwayatpelanggaran" class="btn btn-info btn-sm">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                        Riwayat Pelanggaran
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $murid->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div class="modal modal-blur fade" id="modal-editmurid" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Murid</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="loadeditform">
                
            </div>
        </div>
    </div>
</div>
@endsection
@push('myscript')
<script>
    $(function(){
        $("#btnTambahmurid").click(function(){
            $("#modal-inputmurid").modal("show");
        });

        $(".delete-confirm").click(function(e){
            var form = $(this).closest('form');
            e.preventDefault();
            /*
            Swal.fire({
                title: "Apakah Anda Yakin Data Ini Mau di Delete?",
                showCancelButton: true,
                confirmButtonText: "Delete"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                  Swal.fire("Deleted!", "", "success");
                }
            });
            */
            Swal.fire({
                title: "Apakah Anda Yakin Data ini Mau Di Hapus?",
                text: "Jika Ya Maka Data Akan Terhapus Permanen",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Hapus Saja"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Data Berhasil Di Hapus",
                        icon: "success"
                  });
                }
            });
        });

        $("#frmMurid").submit(function(){
            var nisn = $("#nisn").val();
            var nama_lengkap = $("#nama_lengkap").val();
            var kelas = $("#kelas").val();
            var no_hp = $("#no_hp").val();
            var kode_jurusan = $("frmMurid").find("#kode_jurusan").val();
            if(nisn==""){
                //alert('NISN Harus Diisi');
                Swal.fire({
                    title: 'Warning!',
                    text: 'NISN Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                  }).then(()=> {
                      $("#nisn").focus();
                  });
                return false;
            } else if (nama_lengkap==""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Nama Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                  }).then(()=> {
                      $("#nama_lengkap").focus();
                  });
                return false;
            } else if (kelas==""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Kelas Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                  }).then(()=> {
                      $("#kelas").focus();
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
    });
</script>
@endpush