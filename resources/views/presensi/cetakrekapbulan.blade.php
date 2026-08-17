<?php
// require '../vendor/autoload.php';
use Carbon\Carbon;
\Carbon\Carbon::setLocale('id');
$conn = new mysqli("localhost", "u859704623_fatur_rahman_8", "Presensismkn2kld123*", "u859704623_presensigps");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rekap Presensi Bulanan</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        @page {
            size: 21cm 33cm;
            margin: 1.5cm 1cm;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            background-color: #f8f8f8;
            /* Biar kelihatan tengah di web */
        }

        .page {
            width: 19.8cm;
            min-height: 33cm;
            background-color: white;
            padding: 0;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #title {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
        }

        .tabel-wrapper {
            max-width: 100%;
            overflow-x: auto;
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
            width: 100%;
            margin: auto;
            border-collapse: collapse;
            table-layout: auto;
            word-wrap: break-word;
        }

        .tabelpresensi tr th {
            border: 1px solid #131212;
            padding: 3px;
            background-color: #dbdbdb;
            font-size: 8px;
            word-break: break-word;
        }

        .tabelpresensi tr td {
            border: 1px solid #131212;
            padding: 1px;
            font-size: 8px;
            word-break: break-word;
        }

        .tulisan-vertikal {
            writing-mode: vertical-lr;
            transform: rotate(180deg);
            white-space: nowrap;
        }

        @media print {
            body {
                background: none;
            }

            .page {
                margin: 0;
                padding: 0;
            }

            .tabelpresensi {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="legal potrait">

    <section class="sheet padding-10mm">

        <div class="page">

            {{-- =========================================================
            HEADER SEKOLAH
            ========================================================== --}}

            <table style="width: 100%;">
                <tr>
                    <td style="width: 15%; text-align: center;">
                        <img src="{{ asset('assets/img/lampung.png') }}" width="75" height="80" alt="">
                    </td>

                    <td style="width: 70%; text-align: center;">

                        <div style="
                            font-family: Arial, Helvetica, sans-serif;
                            font-size: 18px;
                            font-weight: bold;
                        ">
                            PEMERINTAH PROVINSI LAMPUNG<br>
                            DINAS PENDIDIKAN<br>
                            SMK NEGERI 2 KALIANDA
                        </div>

                        <div style="
                            font-family: Arial, Helvetica, sans-serif;
                            font-size: 12px;
                            font-style: italic;
                            margin-top: 5px;
                        ">
                            Alamat : Jl. Soekarno-Hatta KM 52 Kalianda 35513
                            Telp. 0727-322282 Fax. 0727-322282
                        </div>

                    </td>

                    <td style="width: 15%; text-align: center;">
                        <img src="{{ asset('assets/img/logo_smkn2.png') }}" width="75" height="80" alt="">
                    </td>
                </tr>
            </table>


            {{-- GARIS HEADER --}}
            <hr style="border: 2px solid black; margin: 0;">
            <hr style="border: 1px solid black; margin-top: 1px;">


            {{-- =========================================================
            JUDUL REKAP
            ========================================================== --}}

            <table style="
                width: 100%;
                font-family: Arial, Helvetica, sans-serif;
            ">

                <tr>
                    <td colspan="4" style="text-align: center;">
                        <div style="
                            font-size: 18px;
                            font-weight: bold;
                        ">
                            REKAPITULASI ABSEN SISWA BULANAN<br>
                            TAHUN PELAJARAN {{ $tahun }}<br>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td style="
                        width: 8%;
                        font-size: 14px;
                        font-weight: bold;
                    ">
                        Jurusan
                    </td>

                    <td style="
                        width: 2%;
                        font-size: 14px;
                        font-weight: bold;
                        text-align: center;
                    ">
                        :
                    </td>

                    <td style="
                        width: 40%;
                        font-size: 14px;
                        font-weight: bold;
                    ">
                        {{ $nama_jurusan ?? '...' }}
                    </td>
                </tr>

                <tr>
                    <td style="
                        font-size: 14px;
                        font-weight: bold;
                    ">
                        Kelas
                    </td>

                    <td style="
                        font-size: 14px;
                        font-weight: bold;
                        text-align: center;
                    ">
                        :
                    </td>

                    <td style="
                        font-size: 14px;
                        font-weight: bold;
                    ">
                        {{ $kelas ?? '...' }}
                    </td>
                </tr>

            </table>


            {{-- =========================================================
            TABEL PRESENSI
            ========================================================== --}}

            <table class="tabelpresensi">

                @php
                    $jumlahHari = cal_days_in_month(
                        CAL_GREGORIAN,
                        $bulan,
                        $tahun
                    );
                @endphp


                {{-- =====================================================
                HEADER BULAN + KETERANGAN
                ====================================================== --}}

                <tr>

                    <th colspan="3">
                        BULAN {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }}
                    </th>

                    <th colspan="{{ $jumlahHari }}">
                        Tanggal
                    </th>

                    <th rowspan="3" style="
                            vertical-align: top;
                            background-color: green;
                            color: white;
                        ">
                        H<br>A<br>D<br>I<br>R
                    </th>

                    <th rowspan="3" style="
                            vertical-align: top;
                            background-color: saddlebrown;
                            color: white;
                        ">
                        T<br>E<br>R<br>L<br>A<br>M<br>B<br>A<br>T
                    </th>

                    <th rowspan="3" style="
                            vertical-align: top;
                            background-color: red;
                            color: white;
                        ">
                        A<br>L<br>F<br>A
                    </th>

                    <th rowspan="3" style="
                            vertical-align: top;
                            background-color: yellow;
                            color: black;
                        ">
                        I<br>Z<br>I<br>N
                    </th>

                    <th rowspan="3" style="
                            vertical-align: top;
                            background-color: blue;
                            color: white;
                        ">
                        S<br>A<br>K<br>I<br>T
                    </th>

                    <th rowspan="3" style="
                            vertical-align: top;
                            background-color: purple;
                            color: white;
                        ">
                        B<br>O<br>L<br>O<br>S
                    </th>

                    <th rowspan="3" style="vertical-align: top;">
                        K<br>e<br>t.
                    </th>

                </tr>


                {{-- =====================================================
                HEADER NOMOR
                ====================================================== --}}

                <tr>

                    <th rowspan="2" style="
                            width: 30px;
                            text-align: center;
                        ">
                        No
                    </th>

                    <th rowspan="2" style="
                            width: 120px;
                            text-align: center;
                        ">
                        NISN
                    </th>

                    <th rowspan="2" style="width: 180px;">
                        Nama Murid
                    </th>

                    @for ($i = 1; $i <= $jumlahHari; $i++)

                        <th>
                            {{ $i }}
                        </th>

                    @endfor

                </tr>


                {{-- =====================================================
                HEADER NAMA HARI
                ====================================================== --}}

                <tr>

                    @php
                        $hariIndonesia = [
                            'Sunday' => 'Minggu',
                            'Monday' => 'Senin',
                            'Tuesday' => 'Selasa',
                            'Wednesday' => 'Rabu',
                            'Thursday' => 'Kamis',
                            'Friday' => 'Jumat',
                            'Saturday' => 'Sabtu',
                        ];
                    @endphp

                    @for ($i = 1; $i <= $jumlahHari; $i++)

                        @php
                            $tanggalHeader = Carbon\Carbon::create(
                                $tahun,
                                $bulan,
                                $i
                            );

                            $hariInggris = $tanggalHeader->format('l');

                            $hariHeader = $hariIndonesia[$hariInggris] ?? $hariInggris;

                            $hurufHari = '';

                            foreach (mb_str_split($hariHeader) as $huruf) {
                                $hurufHari .= $huruf . '<br>';
                            }
                        @endphp

                        <th style="
                                text-align: center;
                                vertical-align: top;
                                line-height: 1;
                            ">
                            {!! $hurufHari !!}
                        </th>

                    @endfor

                </tr>


                {{-- =====================================================
                DATA SISWA
                ====================================================== --}}

                @php
                    $no = 1;
                    $total_laki_laki = 0;
                    $total_perempuan = 0;

                    $rekap = $rekap->sortBy('nama_lengkap');
                @endphp


                @foreach ($rekap as $d)

                    <tr>

                        {{-- NOMOR --}}
                        <td style="
                                text-align: center;
                                width: 30px;
                            ">
                            {{ $no++ }}
                        </td>


                        {{-- NISN --}}
                        <td style="width: 120px;">
                            {{ $d->nisn }}
                        </td>


                        {{-- NAMA --}}
                        <td style="
                                width: 180px;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                            ">

                            @if ($d->jenis_kelamin === 'Perempuan')

                                <b>
                                    <i>
                                        {{ $d->nama_lengkap }}
                                    </i>
                                </b>

                            @else

                                {{ $d->nama_lengkap }}

                            @endif

                        </td>


                        @php

                            /*
                            |--------------------------------------------------------------------------
                            | TOTAL PER SISWA
                            |--------------------------------------------------------------------------
                            */

                            $totalhadir = 0;
                            $totalterlambat = 0;
                            $totalalfa = 0;
                            $totalizin = 0;
                            $totalsakit = 0;
                            $totalbolos = 0;


                            /*
                            |--------------------------------------------------------------------------
                            | TOTAL JENIS KELAMIN
                            |--------------------------------------------------------------------------
                            */

                            if ($d->jenis_kelamin === 'Laki-laki') {

                                $total_laki_laki++;

                            } else {

                                $total_perempuan++;

                            }

                        @endphp


                        {{-- =================================================
                        PERULANGAN SETIAP TANGGAL
                        ================================================== --}}

                        @for ($i = 1; $i <= $jumlahHari; $i++)

                            @php

                                /*
                                |--------------------------------------------------------------------------
                                | DATA TANGGAL
                                |--------------------------------------------------------------------------
                                */

                                $tgl = 'tgl_' . $i;

                                $dataPresensi = $d->$tgl ?? '';

                                /*
                                |--------------------------------------------------------------------------
                                | Pecah jam masuk dan jam pulang
                                |
                                | Contoh:
                                |
                                | 07:11-14:31
                                | 07:11-
                                | ''
                                |--------------------------------------------------------------------------
                                */

                                if ($dataPresensi !== '') {

                                    $hadir = explode('-', $dataPresensi, 2);

                                    $jam_masuk = $hadir[0] ?? '';
                                    $jam_pulang = $hadir[1] ?? '';

                                } else {

                                    $jam_masuk = '';
                                    $jam_pulang = '';

                                }


                                /*
                                |--------------------------------------------------------------------------
                                | TANGGAL
                                |--------------------------------------------------------------------------
                                */

                                $tanggal = Carbon\Carbon::create(
                                    $tahun,
                                    $bulan,
                                    $i
                                );

                                $tglCari = $tanggal->format('Y-m-d');

                                $hari = $tanggal->format('l');


                                /*
                                |--------------------------------------------------------------------------
                                | CEK HARI MINGGU
                                |--------------------------------------------------------------------------
                                */

                                $isMinggu = ($hari === 'Sunday');


                                /*
                                |--------------------------------------------------------------------------
                                | CEK LIBUR SEKOLAH
                                |--------------------------------------------------------------------------
                                */

                                $isLibur = false;

                                if (!$conn->connect_error) {

                                    $sqlLibur = "
                                                                SELECT COUNT(*) AS total
                                                                FROM libur_sekolah
                                                                WHERE tanggal = '$tglCari'
                                                            ";

                                    $resultLibur = $conn->query($sqlLibur);

                                    if (
                                        $resultLibur &&
                                        $rowLibur = $resultLibur->fetch_assoc()
                                    ) {

                                        $isLibur = ((int) $rowLibur['total'] > 0);

                                    }

                                }


                                /*
                                |--------------------------------------------------------------------------
                                | CEK IZIN / SAKIT
                                |--------------------------------------------------------------------------
                                */

                                $isIzin = false;
                                $isSakit = false;

                                if (!$conn->connect_error) {

                                    $nisn = $d->nisn;

                                    $sqlIzinSakit = "
                                                                SELECT status
                                                                FROM pengajuan_izin
                                                                WHERE nisn = '$nisn'
                                                                AND status_approved = 1
                                                                AND tgl_izin = '$tglCari'
                                                            ";

                                    $resultIzinSakit = $conn->query($sqlIzinSakit);

                                    if ($resultIzinSakit) {

                                        while (
                                            $rowIzinSakit =
                                            $resultIzinSakit->fetch_assoc()
                                        ) {

                                            if ($rowIzinSakit['status'] === 'i') {

                                                $isIzin = true;

                                                $totalizin++;

                                            } elseif (
                                                $rowIzinSakit['status'] === 's'
                                            ) {

                                                $isSakit = true;

                                                $totalsakit++;

                                            }

                                        }

                                    }

                                }


                                /*
                                |--------------------------------------------------------------------------
                                | STATUS PRESENSI
                                |--------------------------------------------------------------------------
                                */

                                $isBolos = false;
                                $isTerlambat = false;
                                $isHadir = false;
                                $isAlfa = false;


                                /*
                                |--------------------------------------------------------------------------
                                | PRIORITAS STATUS
                                |--------------------------------------------------------------------------
                                |
                                | 1. Minggu
                                | 2. Libur
                                | 3. Izin
                                | 4. Sakit
                                | 5. Bolos
                                | 6. Hadir
                                | 7. Alfa
                                |
                                */


                                /*
                                |--------------------------------------------------------------------------
                                | BOLOS
                                |--------------------------------------------------------------------------
                                |
                                | Sudah absen masuk
                                | tetapi belum absen pulang.
                                |
                                | Contoh:
                                |
                                | 07:11-
                                |
                                */

                                if (
                                    !empty($jam_masuk) &&
                                    empty($jam_pulang) &&
                                    !$isIzin &&
                                    !$isSakit &&
                                    !$isLibur &&
                                    !$isMinggu
                                ) {

                                    $isBolos = true;

                                    $totalbolos++;

                                }


                                /*
                                |--------------------------------------------------------------------------
                                | HADIR
                                |--------------------------------------------------------------------------
                                |
                                | Kalau ada jam masuk DAN jam pulang,
                                | maka dihitung HADIR.
                                |
                                | Terlambat tetap termasuk HADIR.
                                |
                                */ elseif (
                                    !empty($jam_masuk) &&
                                    !empty($jam_pulang) &&
                                    !$isIzin &&
                                    !$isSakit &&
                                    !$isLibur &&
                                    !$isMinggu
                                ) {

                                    $isHadir = true;

                                    $totalhadir++;


                                    /*
                                    |--------------------------------------------------------------------------
                                    | TERLAMBAT
                                    |--------------------------------------------------------------------------
                                    */

                                    if ($jam_masuk > $jamMasuk) {

                                        $isTerlambat = true;

                                        $totalterlambat++;

                                    }

                                }


                                /*
                                |--------------------------------------------------------------------------
                                | ALFA
                                |--------------------------------------------------------------------------
                                |
                                | Tidak ada jam masuk
                                | dan tidak ada status izin/sakit/libur.
                                |
                                */ elseif (
                                    empty($jam_masuk) &&
                                    !$isIzin &&
                                    !$isSakit &&
                                    !$isLibur &&
                                    !$isMinggu
                                ) {

                                    $isAlfa = true;

                                    $totalalfa++;

                                }

                            @endphp


                            {{-- =================================================
                            KOTAK STATUS HARIAN
                            ================================================== --}}

                            <td style="text-align: center;">

                                {{-- MINGGU --}}
                                @if ($isMinggu)

                                    <div style="
                                                    width: 10px;
                                                    height: 10px;
                                                    background-color: white;
                                                    margin: auto;
                                                " title="Minggu"></div>


                                    {{-- LIBUR --}}
                                @elseif ($isLibur)

                                    <div style="
                                                    width: 10px;
                                                    height: 10px;
                                                    background-color: gray;
                                                    margin: auto;
                                                " title="Libur"></div>


                                    {{-- IZIN + SAKIT --}}
                                @elseif ($isIzin && $isSakit)

                                    <div style="
                                                    width: 10px;
                                                    height: 10px;
                                                    background-color: yellow;
                                                    margin: auto;
                                                " title="Izin"></div>

                                    <div style="
                                                    width: 10px;
                                                    height: 10px;
                                                    background-color: blue;
                                                    margin: auto;
                                                " title="Sakit"></div>


                                    {{-- IZIN --}}
                                @elseif ($isIzin)

                                    <div style="
                                                    width: 10px;
                                                    height: 10px;
                                                    background-color: yellow;
                                                    margin: auto;
                                                " title="Izin"></div>


                                    {{-- SAKIT --}}
                                @elseif ($isSakit)

                                    <div style="
                                                    width: 10px;
                                                    height: 10px;
                                                    background-color: blue;
                                                    margin: auto;
                                                " title="Sakit"></div>


                                    {{-- BOLOS --}}
                                @elseif ($isBolos)

                                    <div style="
                                                    width: 10px;
                                                    height: 10px;
                                                    background-color: purple;
                                                    margin: auto;
                                                " title="Bolos"></div>


                                    {{-- HADIR TERLAMBAT --}}
                                @elseif ($isTerlambat)

                                    <div style="
                                                    width: 10px;
                                                    height: 10px;
                                                    background-color: saddlebrown;
                                                    margin: auto;
                                                " title="Hadir - Terlambat"></div>


                                    {{-- HADIR --}}
                                @elseif ($isHadir)

                                    <div style="
                                                    width: 10px;
                                                    height: 10px;
                                                    background-color: green;
                                                    margin: auto;
                                                " title="Hadir"></div>


                                    {{-- ALFA --}}
                                @elseif ($isAlfa)

                                    <div style="
                                                    width: 10px;
                                                    height: 10px;
                                                    background-color: red;
                                                    margin: auto;
                                                " title="Alfa"></div>


                                @endif

                            </td>

                        @endfor


                        {{-- =================================================
                        TOTAL HADIR
                        ================================================== --}}

                        <td style="text-align: center;">
                            {{ $totalhadir }}
                        </td>


                        {{-- =================================================
                        TOTAL TERLAMBAT
                        ================================================== --}}

                        <td style="text-align: center;">
                            {{ $totalterlambat }}
                        </td>


                        {{-- =================================================
                        TOTAL ALFA
                        ================================================== --}}

                        <td style="text-align: center;">
                            {{ $totalalfa }}
                        </td>


                        {{-- =================================================
                        TOTAL IZIN
                        ================================================== --}}

                        <td style="text-align: center;">
                            {{ $totalizin }}
                        </td>


                        {{-- =================================================
                        TOTAL SAKIT
                        ================================================== --}}

                        <td style="text-align: center;">
                            {{ $totalsakit }}
                        </td>


                        {{-- =================================================
                        TOTAL BOLOS
                        ================================================== --}}

                        <td style="text-align: center;">
                            {{ $totalbolos }}
                        </td>


                        {{-- =================================================
                        KETERANGAN
                        ================================================== --}}

                        <td style="text-align: center;">

                            @if ($totalalfa >= 24)

                                P3

                            @elseif ($totalalfa >= 16)

                                P2

                            @elseif ($totalalfa >= 8)

                                P1

                            @endif

                        </td>

                    </tr>

                @endforeach

            </table>


            {{-- =========================================================
            KETERANGAN WARNA
            ========================================================== --}}

            <table width="100%" style="
                    margin-top: 20px;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 12px;
                ">

                <tr>

                    <td style="
                        width: 40%;
                        vertical-align: top;
                    ">

                        <b>Keterangan :</b>

                        <br><br>

                        <table style="
                            font-family: Arial, Helvetica, sans-serif;
                            font-size: 10px;
                        ">

                            <tr>

                                {{-- HADIR --}}
                                <td>
                                    <div style="
                                        width: 12px;
                                        height: 12px;
                                        background-color: green;
                                        display: inline-block;
                                    "></div>
                                </td>

                                <td style="padding-right: 5px;">
                                    Hadir
                                </td>


                                {{-- TERLAMBAT --}}
                                <td>
                                    <div style="
                                        width: 12px;
                                        height: 12px;
                                        background-color: saddlebrown;
                                        display: inline-block;
                                    "></div>
                                </td>

                                <td style="padding-right: 5px;">
                                    Terlambat
                                </td>


                                {{-- ALFA --}}
                                <td>
                                    <div style="
                                        width: 12px;
                                        height: 12px;
                                        background-color: red;
                                        display: inline-block;
                                    "></div>
                                </td>

                                <td style="padding-right: 5px;">
                                    Alfa
                                </td>


                                {{-- IZIN --}}
                                <td>
                                    <div style="
                                        width: 12px;
                                        height: 12px;
                                        background-color: yellow;
                                        display: inline-block;
                                    "></div>
                                </td>

                                <td style="padding-right: 5px;">
                                    Izin
                                </td>


                                {{-- SAKIT --}}
                                <td>
                                    <div style="
                                        width: 12px;
                                        height: 12px;
                                        background-color: blue;
                                        display: inline-block;
                                    "></div>
                                </td>

                                <td style="padding-right: 5px;">
                                    Sakit
                                </td>


                                {{-- BOLOS --}}
                                <td>
                                    <div style="
                                        width: 12px;
                                        height: 12px;
                                        background-color: purple;
                                        display: inline-block;
                                    "></div>
                                </td>

                                <td style="padding-right: 5px;">
                                    Bolos
                                </td>

                            </tr>

                        </table>


                        <br><br>


                        {{-- =================================================
                        JUMLAH SISWA
                        ================================================== --}}

                        <table style="width: 50%;">

                            <tr>

                                <td style="
                                    width: 30%;
                                    font-size: 11px;
                                ">
                                    Laki-laki
                                </td>

                                <td style="
                                    width: 5%;
                                    text-align: center;
                                    font-size: 11px;
                                ">
                                    :
                                </td>

                                <td style="font-size: 11px;">
                                    {{ $total_laki_laki }}
                                </td>

                            </tr>


                            <tr>

                                <td style="font-size: 11px;">
                                    Perempuan
                                </td>

                                <td style="
                                    text-align: center;
                                    font-size: 11px;
                                ">
                                    :
                                </td>

                                <td style="font-size: 11px;">
                                    {{ $total_perempuan }}
                                </td>

                            </tr>


                            <tr>

                                <td style="font-size: 11px;">
                                    Jumlah
                                </td>

                                <td style="
                                    text-align: center;
                                    font-size: 11px;
                                ">
                                    :
                                </td>

                                <td style="font-size: 11px;">
                                    {{ $total_laki_laki + $total_perempuan }}
                                </td>

                            </tr>

                        </table>

                    </td>


                    {{-- =====================================================
                    KEPALA SEKOLAH
                    ====================================================== --}}

                    <td style="
                        width: 30%;
                        text-align: justify;
                        vertical-align: top;
                        padding: 0px 5px 5px 20px;
                        font-family: 'Times New Roman', Times, serif;
                        font-size: 12px;
                    ">

                        Kepala Sekolah <br>
                        SMK Negeri 2 Kalianda,

                        <br><br><br><br><br><br><br>

                        <u>
                            <b>
                                NYOMAN MISTER, M.Pd
                            </b>
                        </u>

                        <br>

                        Pembina

                        <br>

                        NIP. 19680814 200012 1 002

                    </td>


                    {{-- =====================================================
                    PETUGAS ABSENSI
                    ====================================================== --}}

                    <td style="
                        width: 30%;
                        text-align: justify;
                        vertical-align: top;
                        padding: 0px 5px 5px 20px;
                        font-family: 'Times New Roman', Times, serif;
                        font-size: 12px;
                    ">

                        Kalianda,
                        {{ Carbon\Carbon::now()->translatedFormat('d F Y') }}

                        <br>

                        Petugas Absensi,

                    </td>

                </tr>

            </table>


            {{-- =========================================================
            LOGO BAWAH
            ========================================================== --}}

            <table style="width: 100%;">

                <tr>

                    <td style="text-align: left;">

                        <img src="{{ asset('assets/img/logo-KAN.png') }}" width="65" height="30" alt="">

                    </td>

                </tr>

            </table>

        </div>

    </section>

</body>

</html>
<?php
$conn->close();
?>