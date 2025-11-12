<form action="{{ url('/poin/'.$murid->nisn.'/updatepoin/'.$riwayat_pelanggaran->id_riwayat) }}" method="POST" id="frmEditMurid" enctype="multipart/form-data">
    @csrf
    <input type="hidden" value="{{ $murid->nisn }}" id="nisn" name="nisn">
    <input type="hidden" value="{{ $riwayat_pelanggaran->id_riwayat }}" id="id_riwayat" name="id_riwayat">

    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <select name="kelompokedit" id="kelompokedit" class="form-select kelompokedit-select">
                    <option value="">-- PILIH KELOMPOK --</option>
                    <option value="kelompok_a" {{ ($riwayat_pelanggaran->kelompok ?? '') == 'kelompok_a' ? 'selected' : '' }}>KELOMPOK A</option>
                    <option value="kelompok_b" {{ ($riwayat_pelanggaran->kelompok ?? '') == 'kelompok_b' ? 'selected' : '' }}>KELOMPOK B</option>
                    <option value="kelompok_c" {{ ($riwayat_pelanggaran->kelompok ?? '') == 'kelompok_c' ? 'selected' : '' }}>KELOMPOK C</option>
                </select>
            </div>
        </div>
    </div>

    <!-- SELECT JENIS PELANGGARAN -->
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <select name="jenis_pelanggaranedit" id="jenis_pelanggaranedit" class="form-select jenis-pelanggaranedit-select">
                    <option value="">-- JENIS PELANGGARAN --</option>
                    <!-- Opsi ini akan diganti/ditambah lewat JavaScript -->
                </select>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group">
                <button class="btn btn-primary w-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-send">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 14l11 -11" />
                        <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                    </svg>
                    Simpan
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    $(function(){
        const kelompokeditSelect = document.getElementById('kelompokedit');
        const pelanggaraneditSelect = document.getElementById('jenis_pelanggaranedit');
    
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
    
        function updatePelanggaranOptions(kelompok) {
          pelanggaraneditSelect.innerHTML = '<option value="">JENIS PELANGGARAN</option>';
          if (dataPelanggaran[kelompok]) {
            dataPelanggaran[kelompok].forEach(function (item) {
              const option = document.createElement('option');
              option.value = item.value;
              option.text = item.text;
              pelanggaraneditSelect.appendChild(option);
            });
          }
        }
        
        kelompokeditSelect.addEventListener('change', function () {
          updatePelanggaranOptions(this.value);
        });
        
        // Panggil saat load jika sudah ada value
        if (kelompokeditSelect.value) {
          updatePelanggaranOptions(kelompokeditSelect.value);
        }

        $("#frmEditMurid").submit(function(){
            var kelompok = $(this).find(".kelompokedit-select").val();
            var jenis_pelanggaran = $(this).find(".jenis-pelanggaranedit-select").val();
            if(kelompok==""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Kelompok edit Harus Diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                  }).then(()=> {
                      $("#kelompok").focus();
                  });
                return false;
            } else if (jenis_pelanggaran==""){
                Swal.fire({
                    title: 'Warning!',
                    text: 'Jenis Pelanggaran edit Harus Diisi',
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