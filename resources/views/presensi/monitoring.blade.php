@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Monitoring Presensi
                </h2>
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
                                @if (Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (Session::get('error'))
                                    <div class="alert alert-warning">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-event"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M16 3l0 4" /><path d="M8 3l0 4" /><path d="M4 11l16 0" /><path d="M8 15h2v2h-2z" /></svg>
                                    </span>
                                    <input type="text" value="{{ date("Y-m-d") }}" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal Presensi" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                                    </span>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Murid">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-icon mb-3">
                                    <select name="kelas" id="kelas" class="form-select">
                                        <option value="">Kelas</option>
                                        <option value="X" {{ request('kelas') == 'X' ? 'selected' : '' }}>Kelas X</option>
                                        <option value="XI" {{ request('kelas') == 'XI' ? 'selected' : '' }}>Kelas XI</option>
                                        <option value="XII" {{ request('kelas') == 'XII' ? 'selected' : '' }}>Kelas XII</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-icon mb-3">
                                    <select name="kode_jurusan" id="kode_jurusan" class="form-select">
                                        <option value="">Jurusan</option>
                                        @foreach ($jurusan as $d)
                                            <option {{ Request('kode_jurusan')==$d->kode_jurusan ? 'selected' : '' }} value="{{ $d->kode_jurusan }}">{{ $d->nama_jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                {{-- ALERT HARI --}}
                                @if ($hari == 0)
                                    <div class="alert alert-warning text-center">
                                        <strong>Hari Minggu</strong> – Tidak ada kegiatan presensi
                                    </div>
                                @elseif ($isLibur)
                                    <div class="alert alert-info text-center">
                                        <strong>Hari Libur Sekolah</strong> – Presensi ditiadakan
                                    </div>
                                @endif
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">No.</th>
                                            <th style="text-align:center;">NISN</th>
                                            <th style="text-align:center;">Nama Murid</th>
                                            <th style="text-align:center;">Kelas</th>
                                            <th style="text-align:center;">Jurusan</th>
                                            <th style="text-align:center;">Jam Masuk</th>
                                            <th style="text-align:center;">Jam Pulang</th>
                                            <th style="text-align:center;">keterangan</th>
                                            <th style="text-align:center;">Koordinat</th>
                                            <th style="text-align:center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="loadpresensi"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Maps Jam Masuk --}}
<div class="modal modal-blur fade" id="modal-peta_jam_masuk" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Koordinat saat Jam Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="loadmap_jam_masuk">
                
            </div>
        </div>
    </div>
</div>

{{-- Modal Maps Jam Pulang --}}
<div class="modal modal-blur fade" id="modal-peta_jam_pulang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Koordinat saat Jam Pulang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="loadmap_jam_pulang">
                
            </div>
        </div>
    </div>
</div>



{{-- Modal Edit Keterangan Absen --}}
<div class="modal modal-blur fade" id="modal-edit_keterangan_absen" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Keterangan Absen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_edit_keterangan_absen">
                
            </div>
        </div>
    </div>
</div>
@endsection
@push('myscript')
<script>
    function loadpresensi() {
        // Ambil nilai input dan rapikan spasi
        let tanggal         = $("#tanggal").val()?.trim() || '';
        let nama_lengkap    = $("#nama_lengkap").val()?.trim();
        let kelas           = $("#kelas").val()?.trim();
        let kode_jurusan    = $("#kode_jurusan").val()?.trim();

        // Kosongkan parameter jika tidak ada input (agar tidak ikut menyaring)
        nama_lengkap    = nama_lengkap  === '' ? null : nama_lengkap;
        kelas           = kelas         === '' ? null : kelas;
        kode_jurusan    = kode_jurusan  === '' ? null : kode_jurusan;

        $.ajax({
            type: 'POST',
            url: '/getpresensi',
            data: {
                _token          : "{{ csrf_token() }}",
                tanggal         : tanggal,
                nama_lengkap    : nama_lengkap,
                kelas           : kelas,
                kode_jurusan    : kode_jurusan
            },
            cache: false,
            success: function(respond) {
                $("#loadpresensi").html(respond);
            },
            error: function(xhr, status, error) {
                console.error("Gagal memuat data presensi:", error);
                $("#loadpresensi").html("<tr><td colspan='9' class='text-danger text-center'>Terjadi kesalahan saat memuat data.</td></tr>");
            }
        });
    }

    // Event listener
    $("#tanggal, #nama_lengkap, #kelas, #kode_jurusan").on("change keyup", function() {
        loadpresensi();
    });

    // Inisialisasi datepicker
    $("#tanggal").datepicker({ 
        autoclose       : true, 
        todayHighlight  : true,
        format          : 'yyyy-mm-dd'
    });

    // Panggil saat pertama kali halaman dibuka
    $(document).ready(function() {
        loadpresensi();
    });
</script>
@endpush