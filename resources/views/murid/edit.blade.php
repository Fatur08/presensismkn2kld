@extends('layouts.admin.murid.edit_murid')
@section('content')
<form action="/murid/{{ $murid->nisn }}/update" method="POST" id="FormEditMurid" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-barcode"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
                </span>
                <input type="hidden" id="nisn_lama" name="nisn_lama" value="{{ $murid->nisn }}">
                <input
                    type="text"
                    value="{{ $murid->nisn }}"
                    id="nisn_baru"
                    name="nisn_baru"
                    class="form-control"
                    placeholder="Masukkan NISN"
                    inputmode="numeric"
                    pattern="[0-9]+"
                    minlength="10"
                    maxlength="10"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                >  
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                </span>
                <input type="text" value="{{ $murid->nama_lengkap}}" id="nama_murid" name="nama_murid" class="form-control" placeholder="Nama Lengkap">
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <select name="kelas" id="kelas" class="form-select">
                    <option value="">Pilih Kelas</option>
                    <option value="X" {{ $murid->kelas === 'X' ? 'selected' : '' }}>Kelas X</option>
                    <option value="XI" {{ $murid->kelas === 'XI' ? 'selected' : '' }}>Kelas XI</option>
                    <option value="XII" {{ $murid->kelas === 'XII' ? 'selected' : '' }}>Kelas XII</option>
                </select>
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <select name="kode_jurusan" id="kode_jurusan" class="form-select">
                <option value="">Jurusan</option>
                @foreach ($jurusan as $d)
                    <option {{ $murid->kode_jurusan ==$d->kode_jurusan ? 'selected' : '' }} value="{{ $d->kode_jurusan }}">{{ $d->nama_jurusan }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-phone"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
                </span>
                <input
                    type="text"
                    value="{{ $murid->no_hp }}"
                    id="no_hp"
                    name="no_hp"
                    class="form-control"
                    placeholder="Masukkan Nomor HP"
                    inputmode="numeric"
                    pattern="[0-9]+"
                    minlength="10"
                    maxlength="15"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                >
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <small class="text-muted">
                Nomor HP hanya boleh angka (contoh: 08xxxxxxxxxx)
            </small>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <input type="file" id="foto" name="foto" class="form-control">
            <input type="hidden" name="old_foto" value="{{ $murid->foto }}">
        </div>
        <div class="col-6 mt-2">
            <label>Masukkan Foto Murid</label>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <button class="btn btn-primary w-100">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-send"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                    Simpan
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
@push('myscript')
<script>
    $(function(){
        $("#FormEditMurid").submit(function(){
            var nisn_baru = $("#nisn_baru").val();
            var nama_murid = $("#nama_murid").val();
            var kelas = $("#kelas").val();
            var kode_jurusan = $("#kode_jurusan").val();
            var no_hp = $("#no_hp").val();
            var foto = $("#foto").val();
            if(nisn_baru==""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'NISN Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                  }).then(()=> {
                      $("#nisn_baru").focus();
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
            } else if (kode_jurusan==""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Jurusan Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                  }).then(()=> {
                      $("#kode_jurusan").focus();
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
            } else if (foto==""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Foto Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                  }).then(()=> {
                      $("#foto").focus();
                  });
                return false;
            }
        });
    });
</script>
@endpush