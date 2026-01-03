@extends('layouts.presensi')
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<style>
    .datepicker-modal{
        max-height: 430px !important;
    }

    .datepicker-date-display{
        background-color: #0f3a7e !important;
    }
</style>
<!--- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="/presensi/izin" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Form Izin / Sakit Murid</div>
    <div class="right"></div>
</div>
<!--- * App Header -->
@endsection
@section('content')
<div class="row" style="margin-top: 70px;">
    <div class="col">
        <form action="/presensi/storeizin" method="POST" id="frmIzin">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <h4>Masukkan Tanggal</h4>
                        <input type="text" id="tgl_izin" name="tgl_izin" class="form-control datepicker" placeholder="Tanggal">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-group">
                        <select name="status" id="status" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="i">Izin</option>
                            <option value="s">Sakit</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-group">
                        <h4>Masukkan Keterangan</h4>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control" placeholder="Keterangan"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-group">
                        <h4>Masukkan Bukti Izin / Sakit</h4>
                        <input type="file" name="bukti_izin" id="bukti_izin" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-primary w-100">Kirim</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('myscript')
<script>
    var currYear = (new Date()).getFullYear();
    $(document).ready(function() {
      $(".datepicker").datepicker({
        format: "yyyy-mm-dd"    
      });

      $("#tgl_izin").change(function(e){
        var tgl_izin = $(this).val();
        $.ajax({
            type:'POST',
            url:'/presensi/cekpengajuanizin',
            data: {
                _token: "{{ csrf_token() }}",
                tgl_izin: tgl_izin
            },
            cache:false,
            success:function(respond){
                if(respond==1){
                    Swal.fire({
                        title: 'Oops !',
                        text: 'Anda Sudah Melakukan Input Pengajuan Izin Pada Tanggal Tersebut',
                        icon: 'warning'
                    }).then((result) => {
                        $("#tgl_izin").val("");
                    });
                }
            }
        });
      });

      $("#frmIzin").submit(function(){
        var tgl_izin = $("#tgl_izin").val();
        var status = $("#status").val();
        var keterangan = $("#keterangan").val();
        if(tgl_izin==""){
            Swal.fire({
                title: 'Oops !',
                text: 'Tanggal Harus Diisi',
                icon: 'warning'
            });
            return false;
        } else if (status==""){
            Swal.fire({
                title: 'Oops !',
                text: 'Status Harus Diisi',
                icon: 'warning'
            });
            return false;
        } else if (keterangan==""){
            Swal.fire({
                title: 'Oops !',
                text: 'Keterangan Harus Diisi',
                icon: 'warning'
            });
            return false;
        }
      });
    });
</script>
@endpush