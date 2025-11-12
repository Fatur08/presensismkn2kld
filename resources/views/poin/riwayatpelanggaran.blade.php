@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Riwayat Pelanggaran {{ $murid->nama_lengkap }}
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
                                @if (Session::get('warning'))
                                    <div class="alert alert-warning">
                                        {{ Session::get('warning') }}
                                    </div>
                                @endif
                                @if (Session::get('error'))
                                    <div class="alert alert-warning">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                @if ($notifikasi_a)
                                    <div class="alert alert-danger">
                                        {!! $notifikasi_a !!}
                                    </div>
                                @endif
                                @if ($notifikasi_b)
                                    <div class="alert alert-danger">
                                        {!! $notifikasi_b !!}
                                    </div>
                                @endif
                                @if ($notifikasi_c)
                                    <div class="alert alert-danger">
                                        {!! $notifikasi_c !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-primary" id="btnTambahmurid">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kelompok Pelanggaran</th>
                                            <th>Jenis Pelanggaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($riwayatpelanggaran as $d)
                                        <tr>
                                            <td>{{ $loop->iteration + $riwayatpelanggaran->firstItem()-1 }}</td>
                                            <td>
                                                @if($d->kelompok == 'kelompok_a')
                                                    KELOMPOK A
                                                @elseif($d->kelompok == 'kelompok_b')
                                                    KELOMPOK B
                                                @elseif($d->kelompok == 'kelompok_c')
                                                    KELOMPOK C
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $d->jenis_pelanggaran }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" class="edit btn btn-info btn-sm" nisn="{{ $d->nisn }}" id_riwayat="{{ $d->id_riwayat }}">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                        Edit
                                                    </a>
                                                    <form action="/poin/{{ $d->id_riwayat }}/delete" style="margin-left: 5px;" method="POST">
                                                        @csrf
                                                        <a class="btn btn-danger btn-sm delete-confirm" >
                                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" /><path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" /></svg>
                                                            Hapus
                                                        </a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $riwayatpelanggaran->links('vendor.pagination.bootstrap-5') }}
                        <div class="row mt-2">
                            <div class="col-12">
                                <a href="/poin/poin" class="btn btn-primary" id="btnTambahmurid">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Input Data Pelanggaran Murid --}}
<div class="modal modal-blur fade" id="modal-inputpelanggaranmurid" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Pelanggaran {{ $murid->nama_lengkap }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/poin/store" method="POST" id="frmMurid" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $murid->nisn }}" id="nisn" name="nisn">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <select name="kelompok" id="kelompok" class="form-select kelompokadd-select">
                                    <option value="">KELOMPOK</option>
                                    <option value="kelompok_a">KELOMPOK A</option>
                                    <option value="kelompok_b">KELOMPOK B</option>
                                    <option value="kelompok_c">KELOMPOK C</option>
                                </select>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-icon mb-3">
                                <select name="jenis_pelanggaran" id="jenis_pelanggaran" class="form-select jenis-pelanggaranadd-select">
                                    <option value="">JENIS PELANGGARAN</option>
                                </select>
                              </div>
                        </div>
                    </div>
                    <div class="row mt-2">
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
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit Pelanggaran Murid --}}
<div class="modal modal-blur fade" id="modal-editmurid" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Pelanggaran {{ $murid->nama_lengkap }}</h5>
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
            $("#modal-inputpelanggaranmurid").modal("show");
        });

        $(".edit").click(function(){
            var id_riwayat = $(this).attr('id_riwayat');
            var nisn = $(this).attr('nisn');
            $.ajax({
                type:'POST',
                url: '/poin/' + nisn + '/editpoin/' + id_riwayat,
                cache:false,
                data:{
                    _token : "{{ csrf_token() }}",
                    id_riwayat : id_riwayat,
                    nisn : nisn
                },
                success:function(respond){
                    $("#loadeditform").html(respond);
                }
            });
            $("#modal-editmurid").modal("show");
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
                title: "Apakah Anda Yakin Data ini Ingin Di Hapus?",
                text: "Jika Ya Maka Data Akan Terhapus Permanen",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus Saja",
                cancelButtonText: "Batalkan"
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

        const kelompokSelect = document.getElementById('kelompok');
        const pelanggaranSelect = document.getElementById('jenis_pelanggaran');
        const dataPelanggaran = {
          kelompok_a: [
            { value: 'a. Memalsukan tanda tangan, wali kelas atau kepala sekolah', text: 'a. Memalsukan tanda tangan, wali kelas atau kepala sekolah' },
            { value: 'b. Membawa minum-minuman keras/narkoba', text: 'b. Membawa minum-minuman keras/narkoba' },
            { value: 'c. Berkelahi atau main hakim sendiri', text: 'c. Berkelahi atau main hakim sendiri' },
            { value: 'd. Merusak sarana/prasarana sekolah', text: 'd. Merusak sarana/prasarana sekolah' },
            { value: 'e. Mengambil milik orang lain', text: 'e. Mengambil milik orang lain' },
            { value: 'f. Membawa/menyebarkan selebaran yang menimbulkan kerusuhan', text: 'f. Membawa/menyebarkan selebaran yang menimbulkan kerusuhan' },
            { value: 'g. Berurusan dengan pihak berwajib kerena melaukakan tindak kejahatan', text: 'g. Berurusan dengan pihak berwajib kerena melaukakan tindak kejahatan' },
            { value: 'h. Membawa senjata tajam', text: 'h. Membawa senjata tajam' },
            { value: 'i. Merubah/memalsukan raport', text: 'i. Merubah/memalsukan raport' },
            { value: 'j. Mengikuti organisasi terlarang', text: 'j. Mengikuti organisasi terlarang' }
          ],
          kelompok_b: [
            { value: 'a. Membuat saran ijin palsu', text: 'a. Membuat saran ijin palsu' },
            { value: 'b. Membolos/keluar meninggalkan sekolah tanpa ijin', text: 'b. Membolos/keluar meninggalkan sekolah tanpa ijin' },
            { value: 'c. Membawa Handphone', text: 'c. Membawa Handphone' },
            { value: 'd. Membawa buku/gambar/video porno', text: 'd. Membawa buku/gambar/video porno' },
            { value: 'e. Melindungi teman yang bersalah', text: 'e. Melindungi teman yang bersalah' },
            { value: 'f. Meloncat pagar', text: 'f. Meloncat pagar' },
            { value: 'g. Mengganggu/mengacau kelas lain', text: 'g. Mengganggu/mengacau kelas lain' },
            { value: 'i. Mencorat-coret tembok, pintu, meja, kursi, dengan kata-kata yang tidak semestinya', text: 'i. Mencorat-coret tembok, pintu, meja, kursi, dengan kata-kata yang tidak semestinya' },
            { value: 'j. Merokok disekolah', text: 'j. Merokok disekolah' },
            { value: 'k. Menyembunyikan petasan disekolah', text: 'k. Menyembunyikan petasan disekolah' }
          ],
          kelompok_c: [
            { value: 'a. Datang terlambat masuk sekolah', text: 'a. Datang terlambat masuk sekolah' },
            { value: 'b. Tidak megikuti apel pagi', text: 'b. Tidak megikuti apel pagi' },
            { value: 'c. Keluar kelas tanpa ijin', text: 'c. Keluar kelas tanpa ijin' },
            { value: 'd. Tidak melakukan tugas piket kelas', text: 'd. Tidak melakukan tugas piket kelas' },
            { value: 'e. Berpakaian seragam tidak lengkap', text: 'e. Berpakaian seragam tidak lengkap' },
            { value: 'f. Makan didalam kelas (waktu pelajaran)', text: 'f. Makan didalam kelas (waktu pelajaran)' },
            { value: 'g. Membeli makanan waktu pelajaran', text: 'g. Membeli makanan waktu pelajaran' },
            { value: 'h. Membuang sampah tidak pada tempatnya', text: 'h. Membuang sampah tidak pada tempatnya' },
            { value: 'i. Bermain ditempat parkir', text: 'i. Bermain ditempat parkir' },
            { value: 'j. Berias yang berlebihan', text: 'j. Berias yang berlebihan' },
            { value: 'k. Memakai gelang, kalung, anting-anting bagi pria', text: 'k. Memakai gelang, kalung, anting-anting bagi pria' },
            { value: 'l. Memakai perhiasan berlebihan bagi wanita', text: 'l. Memakai perhiasan berlebihan bagi wanita' },
            { value: 'm. Tidak mengindahkan surat panggilan', text: 'm. Tidak mengindahkan surat panggilan' },
            { value: 'n. Rambut gondrong/tidak rapi, rambut diwarna', text: 'n. Rambut gondrong/tidak rapi, rambut diwarna' },
            { value: 'o. Berada dikantin, UKS pada waktu pergantian pelajaran tanpa ijin', text: 'o. Berada dikantin, UKS pada waktu pergantian pelajaran tanpa ijin' },
            { value: 'p. Selama upacara berlangsung siswa dilarang di dalam kelas (jika sakit sementara di ruang UKS/ruang data)', text: 'p. Selama upacara berlangsung siswa dilarang di dalam kelas (jika sakit sementara di ruang UKS/ruang data)' },
            { value: 'q. Membuat gaduh selama pelaksanaan KBM', text: 'q. Membuat gaduh selama pelaksanaan KBM' },
            { value: 'r. Tidak memakai sepatu hitam pada hari senin, selasa, rabu, dan kamis', text: 'r. Tidak memakai sepatu hitam pada hari senin, selasa, rabu, dan kamis' },
            { value: 's. Mengendarai kendaraan di halaman sekolah', text: 's. Mengendarai kendaraan di halaman sekolah' }
          ]
        };

        kelompokSelect.addEventListener('change', function () {
          const selectedKelompok = this.value;
        
          // Kosongkan dropdown pelanggaran
          pelanggaranSelect.innerHTML = '<option value="">JENIS PELANGGARAN</option>';
        
          // Tampilkan opsi sesuai kelompok
          if (dataPelanggaran[selectedKelompok]) {
            dataPelanggaran[selectedKelompok].forEach(function (item) {
              const option = document.createElement('option');
              option.value = item.value;
              option.text = item.text;
              pelanggaranSelect.appendChild(option);
            });
          }
        });

        $("#frmMurid").submit(function(){
            var kelompok = $(this).find(".kelompokadd-select").val();
            var jenis_pelanggaran = $(this).find(".jenis-pelanggaranadd-select").val();
            if(kelompok==""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Kelompok Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                  }).then(()=> {
                      $("#kelompok").focus();
                  });
                return false;
            } else if (jenis_pelanggaran==""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Jenis Pelanggaran Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                  }).then(()=> {
                      $("#jenis_pelanggaran").focus();
                  });
                return false;
            }
        });
    });
</script>
@endpush