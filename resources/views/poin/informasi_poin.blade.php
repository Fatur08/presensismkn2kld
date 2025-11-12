<!DOCTYPE html>
<style>
html {
            scroll-behavior: smooth;
        }
</style>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Informasi Poin Pelanggaran</title>

      <!-- Normalize or reset CSS with your favorite library -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

      <!-- Load paper.css for happy printing -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

      <!-- Set page size here: A5, A4 or A3 -->
      <!-- Set also "landscape" if you need -->
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                width: 21cm;
                min-height: 33cm;
                margin: 0 auto;
                box-sizing: border-box;
            }

            .page-break {
                page-break-after: always;
            }

            #title {
                font-size: 18px;
                font-weight: bold;
            }

            .tabeldatamurid {
                margin-top: 40px;
            }

            .tabeldatamurid tr td {
                padding: 5px;
                font-size: 8px;
                word-break: break-word;
            }

            .tabelpresensi {
                border: none;
                width: 100%;
                margin-top: 20px;
                table-layout: auto;
                word-wrap: break-word;
            }

            .tabelpresensi tr th {
                padding: 3px;
                background-color: #dbdbdb;
                font-size: 12px;
                word-break: break-word;
            }

            .tabelpresensi tr td {
                padding: 1px;
                font-size: 12px;
                word-break: break-word;
            }

            .tulisan-vertikal {
                writing-mode: vertical-lr;
                transform: rotate(180deg);
                white-space: nowrap;
            }

            @media print {
                .tabelpresensi {
                    page-break-inside: avoid;
                }
            }
        </style>
    </head>

    <!-- Set "A5", "A4" or "A3" for class name -->
    <!-- Set also "landscape" if you need -->
    <body>
        <?php
        function selisih($jam_masuk, $jam_keluar)
        {
            list($h, $m, $s) = explode(":", $jam_masuk);
            $dtAwal = mktime($h, $m, $s, "1", "1", "1");
            list($h, $m, $s) = explode(":", $jam_keluar);
            $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
            $dtSelisih = $dtAkhir - $dtAwal;
            $totalmenit = $dtSelisih / 60;
            $jam = explode(".", $totalmenit / 60);
            $sisamenit = ($totalmenit / 60) - $jam[0];
            $sisamenit2 = $sisamenit * 60;
            $jml_jam = $jam[0];
            return $jml_jam . ":" . round($sisamenit2);
        }
        ?>

        <!-- Each sheet element should have the class "sheet" -->
        <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
        <div class="sheet padding-10mm">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 15%; text-align: center;">
                        <img src="{{ asset('assets/img/lampung.png') }}" width="75" height="80" alt="">
                    </td>
                    <td style="width: 70%; text-align: center;">
                        <div style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: bold;">
                            PEMERINTAH PROVINSI LAMPUNG<br>
                            DINAS PENDIDIKAN<br>
                            SMK NEGERI 2 KALIANDA
                        </div>
                        <div style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: italic; margin-top: 5px;">
                            Alamat : Jl. Soekarno-Hatta KM 52 Kalianda 35513 Telp. 0727-322282 Fax. 0727-322282
                        </div>
                    </td>
                    <td style="width: 15%; text-align: center;">
                        <img src="{{ asset('assets/img/logo_smkn2.png') }}" width="75" height="80" alt="">
                    </td>
                </tr>
            </table>

            <!-- Garis dua -->
            <hr style="border: 2px solid black; margin: 0;">
            <hr style="border: 1px solid black; margin-top: 1px;">

            <table style="width: 100%; font-family: Arial, Helvetica, sans-serif;">
                <tr>
                    <td colspan="4" style="text-align: center;">
                        <div style="font-size: 18px; font-weight: bold;">
                            INFORMASI POIN PELANGGARAN<br>
                        </div>
                    </td>
                </tr>
            </table>

            <table class="tabelpresensi">
                <tr>
                    <td colspan="3" style="font-weight: bold; padding: 5px;">I. KLASIFIKASI PELANGGARAN SISWA</td>
                </tr>
                <tr>
                    <td style="padding-left: 1em;"></td>
                    <td colspan="2" style="font-weight: bold; padding: 5px;">KELOMPOK A</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">a. Memalsukan tanda tangan, wali kelas atau kepala sekolah</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">b. Membawa minum-minuman keras/narkoba</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">c. Berkelahi atau main hakim sendiri</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">d. Merusak sarana/prasarana sekolah</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">e. Mengambil milik orang lain</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">f. Membawa/menyebarkan selebaran yang menimbulkan kerusuhan</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">g. Berurusan dengan pihak berwajib kerena melaukakan tindak kejahatan</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">h. Membawa senjata tajam</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">i. Merubah/memalsukan raport</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">j. Mengikuti organisasi terlarang</td>
                </tr>

                <tr>
                    <td colspan="3" style="padding: 5px;"></td>
                </tr>

                <tr>
                    <td style="padding-left: 1em;"></td>
                    <td colspan="2" style="font-weight: bold; padding: 5px;">KELOMPOK B</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">a. Membuat saran ijin palsu</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">b. Membolos/keluar meninggalkan sekolah tanpa ijin</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">c. Membawa Handphone</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">d. Membawa buku/gambar/video porno</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">e. Melindungi teman yang bersalah</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">f. Meloncat pagar</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">g. Mengganggu/mengacau kelas lain</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">h. Bersikap tidak sopan/menantang guru/karyawan</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">i. Mencorat-coret tembok, pintu, meja, kursi, dengan kata-kata yang tidak semestinya</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">j. Merokok disekolah</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">k. Menyembunyikan petasan disekolah</td>
                </tr>

                <tr>
                    <td colspan="3" style="padding: 5px;"></td>
                </tr>

                <tr>
                    <td style="padding-left: 1em;"></td>
                    <td colspan="2" style="font-weight: bold; padding: 5px;">KELOMPOK C</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">a. Datang terlambat masuk sekolah</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">b. Tidak megikuti apel pagi</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">c. Keluar kelas tanpa ijin</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">d. Tidak melakukan tugas piket kelas</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">e. Berpakaian seragam tidak lengkap</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">f. Makan didalam kelas (waktu pelajaran)</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">g. Membeli makanan waktu pelajaran</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">h. Membuang sampah tidak pada tempatnya</td>
                </tr>
            </table>
        </div>

        <!--<div class="page-break"></div>-->

        <div class="sheet padding-10mm">
            <table class="tabelpresensi">
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">i. Bermain ditempat parkir</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">j. Berias yang berlebihan</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">k. Memakai gelang, kalung, anting-anting bagi pria</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">l. Memakai perhiasan berlebihan bagi wanita</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">m. Tidak mengindahkan surat panggilan</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">n. Rambut gondrong/tidak rapi, rambut diwarna</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">o. Berada dikantin, UKS pada waktu pergantian pelajaran tanpa ijin</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">p. Selama upacara berlangsung siswa dilarang di dalam kelas (jika sakit sementara di ruang UKS/ruang data)</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">q. Membuat gaduh selama pelaksanaan KBM</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">r. Tidak memakai sepatu hitam pada hari senin, selasa, rabu, dan kamis</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold; padding: 5px;">s. Mengendarai kendaraan di halaman sekolah</td>
                </tr>


                <tr>
                    <td colspan="3" style="padding: 10px;"></td>
                </tr>


                <tr>
                    <td colspan="3" style="font-weight: bold; padding: 5px;">II. SANKSI PELANGGARAN SESUAI KLASIFIKASI</td>
                </tr>
                <tr>
                    <td style="padding-left: 1em;"></td>
                    <td colspan="2" style="font-weight: bold; padding: 5px;">1. KELOMPOK A</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">Dikembalikan kepada orang tua dan dipersilahkan mengajukan pemohonan keluar sekolah</td>
                </tr>

                <tr>
                    <td colspan="3" style="padding: 5px;"></td>
                </tr>

                <tr>
                    <td style="padding-left: 1em;"></td>
                    <td colspan="2" style="font-weight: bold; padding: 5px;">2. KELOMPOK B</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">a. Melakukan pelanggaran 1 kali peringatan</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">b. Melakukan pelanggaran 2 kali peringatan dan membuat surat pernyataan diketahui orang tua, wali kelas, guru BK dan kepala Kompetensi keahlian</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">c. Melakukan pelanggaran 3 kali orang tua dipanggil ke sekolah</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">d. Melakukan pelanggaran 4 kali dikembalikan kepada orang tua selama 1 hari dan masuk kembali bersama orang tua</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">e. Melakukan pelanggaran 5 kali dikembalikan ke orang tua selama 1 minggu dan masuk kembali bersama orang tua</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">f. Melakukan pelanggaran 6 kali dan dipersilahkan mengajukan permohonan keluar dari sekolah</td>
                </tr>

                <tr>
                    <td colspan="3" style="padding: 5px;"></td>
                </tr>

                <tr>
                    <td style="padding-left: 1em;"></td>
                    <td colspan="2" style="font-weight: bold; padding: 5px;">3. KELOMPOK C</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">a. Melakukan pelanggaran C1 tidak diijinkan mengikuti pelajaran sampai pergantian jam pelajaran, dilibatkan dalam kebersihan lingkungan sekolah/perpustakaan</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">b. Melakukan pelanggaran 3 kali, diperingatkan harus membuat surat peringatan yang harus diketahui wali kelas</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">c. Melakukan pelanggaran 4 kali diperingatkan harus membuat surat peringatan yang harus diketahui wali kelas, orang tua, guru BK dan kepala Kompetensi keahlian</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">d. Melakukan pelanggaran 5 kali, orang tua diundang ke sekolah</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">e. Melakukan pelanggaran 6 kali, diserahkan kepada orang tua selama 1 hari dan masuk kembali bersama orang tua</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">f. Melakukan pelanggaran 9 kali dikembalikan kepada orang tua dan dipersilahkan mengajukan permohonan pindah sekolah</td>
                </tr>

                <tr>
                    <td colspan="3" style="padding: 5px;"></td>
                </tr>

                <tr>
                    <td style="padding-left: 1em;"></td>
                    <td colspan="2" style="font-weight: bold; padding: 5px;">4. LAIN-LAIN</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">a. Apabila orang tua tidak memenuhi panggilan dari sekolah, maka yang bersangkutan (siswa) tidak diperkenankan mengikuti pelajaran sampai orang tua datang ke sekolah</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">b. Hal-hal yang belum tercantum dalam peraturan ini akan ditentukan kemudian</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 1em;"></td>
                    <td style="font-weight: bold; padding: 5px;">c. Peraturan ini berlaku sejak dtetapkan, apabila kemudian hari terdapat kekeliruan akan ditinjau dan terapkan sebagaimana mestinya</td>
                </tr>
            </table>

            <table style="width: 100%;">
                <tr>
                    <td style="text-align: left;">
                        <img src="{{ asset('assets/img/logo-KAN.png') }}" width="65" height="30" alt="">
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>