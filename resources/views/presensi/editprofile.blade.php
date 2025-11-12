@extends('layouts.presensi')
@section('header')
<!--- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="pageTitle">Edit Profil</div>
    <div class="right"></div>
</div>
<!--- * App Header -->
@endsection

@section('content')
<div class="row" style="margin-top:4rem">
    <div class="col">
        @php
            $messagesuccess = Session::get('success');
            $messageerror = Session::get('error');
        @endphp
        @if(Session::get('success'))
            <div class="alert alert-success">
                {{ $messagesuccess }}
            </div>
        @endif
        @if(Session::get('error'))
            <div class="alert alert-error">
                {{ $messageerror }}
            </div>
        @endif
    </div>
</div>
<form action="/presensi/{{ $murid->nisn }}/updateprofile" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col">
        <div class="form-group boxed">
            <h4>Nama Lengkap</h4>
            <div class="input-wrapper">
                <input type="text" class="form-control" value="{{ $murid->nama_lengkap }}" name="nama_lengkap" placeholder="Nama Lengkap" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <h4>Jurusan</h4>
            <select name="kode_jurusan" id="kode_jurusan" class="form-control">
                    <option value="">Pilih Jurusan</option>
                    @foreach($jurusan as $j)
                        <option {{ $murid->kode_jurusan == $j->kode_jurusan ? 'selected' : '' }} value="{{ $j->kode_jurusan }}">{{ $j->nama_jurusan }}</option>
                    @endforeach
            </select>
        </div>
        <div class="form-group boxed">
            <h4>Kelas</h4>
            <select name="kelas" id="kelas" class="form-control">
                <option value="">Pilih Kelas</option>
                <option value="X" {{ $murid->kelas == 'X' ? 'selected' : '' }}>X</option>
                <option value="XI" {{ $murid->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                <option value="XII" {{ $murid->kelas == 'XII' ? 'selected' : '' }}>XII</option>
            </select>
        </div>
        <div class="form-group boxed">
            <h4>Nomor HP</h4>
            <div class="input-wrapper">
                <input type="text" class="form-control" value="{{ $murid->no_hp }}" name="no_hp" placeholder="No. HP" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed" id="fileUpload1">
            <h4>Foto 3x4</h4>
            <input type="file" name="foto" id="fileuploadInput" accept=".png, .jpg, .jpeg">
            <label for="fileuploadInput">
            </label>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <button type="submit" class="btn btn-primary btn-block">
                    <ion-icon name="refresh-outline"></ion-icon>
                    Update
                </button>
            </div>
        </div>
    </div>
</form>
@endsection