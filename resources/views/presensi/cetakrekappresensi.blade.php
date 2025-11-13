<?php
// require '../vendor/autoload.php';
use Carbon\Carbon;
\Carbon\Carbon::setLocale('id');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Laporan Presensi</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
    <style>
        /* Ukuran F4 Portrait: 21.0 x 33.0 cm */
        @page { 
            size: 21cm 33cm;
            margin: 1cm;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            width: 21cm;
            min-height: 33cm;
            margin: 0 auto;
            padding: 1cm;
            box-sizing: border-box;
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
            font-size: 12px;
            word-break: break-word;
        }

        .tabelpresensi {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            table-layout: auto;
            word-wrap: break-word;
        }

        .tabelpresensi tr th {
            border: 1px solid #131212;
            padding: 3px;
            background-color: #dbdbdb;
            font-size: 12px;
            word-break: break-word;
        }

        .tabelpresensi tr td {
            border: 1px solid #131212;
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
<body class="legal potrait">
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
  <section class="sheet padding-10mm">

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
                    REKAPITULASI ABSENSI KEHADIRAN SISWA<br>
                    TAHUN PELAJARAN {{ $tahun-1 }} / {{ $tahun }}<br>
                </div>
            </td>
        </tr>
    </table>

    <table class="tabeldatamurid">
        <tr>
            <td rowspan="7">
                @php
                $path = Storage::url('uploads/murid/'.$murid->foto);
                @endphp
                <img src="{{ url($path) }}" alt="" width="150" height="150">
            </td>
        </tr>
        <tr>
            <td>NISN</td>
            <td>:</td>
            <td>{{ $murid->nisn }}</td>
        </tr>
        <tr>
            <td>Nama Murid</td>
            <td>:</td>
            <td>{{ $murid->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td>{{ $murid->kelas }}</td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>:</td>
            <td>{{ $murid->nama_jurusan }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $murid->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>No. HP</td>
            <td>:</td>
            <td>{{ $murid->no_hp }}</td>
        </tr>
    </table>

    <table class="tabelpresensi">
        <tr>
            <th>SEMESTER</th>
            <th>BULAN</th>
            <th>SAKIT</th>
            <th>IZIN</th>
            <th>ALPA</th>
            <th>BOLOS</th>
        </tr>

        @php
            $totalSakitGanjil = 0;
            $totalIzinGanjil = 0;
            $totalAlfaGanjil = 0;
            $totalBolosGanjil = 0;
            $totalSakitGenap = 0;
            $totalIzinGenap = 0;
            $totalAlfaGenap = 0;
            $totalBolosGenap = 0;
        @endphp

        @foreach ($rekapganjil as $d)  
            <?php
                $semester = 'ganjil'; // atau 'ganjil'
                $bulanSemesterGanjil = [];

                if ($semester == 'ganjil') {
                    $bulanSemesterGanjil = [7, 8, 9, 10, 11, 12];
                }
            
                // Inisialisasi array untuk total tiap bulan
                $rekapBulan = [];
                foreach ($bulanSemesterGanjil as $bulan) {
                    $rekapBulan[$bulan] = [
                        'hadir' => 0,
                        'sakit' => 0,
                        'izin' => 0,
                        'alfa' => 0,
                        'bolos' => 0,
                    ];
                }
            
                // Ambil data dari presensi dan izin/sakit
                foreach ($bulanSemesterGanjil as $bulan) {
                    $daysInMonth = Carbon::createFromDate(null, $bulan, 1)->daysInMonth;
                
                    for ($i = 1; $i <= $daysInMonth; $i++) {
                        $tgl = "tgl_" . $i;
                        if (empty($d->$tgl)) {
                            $hadir = ['', ''];
                        } else {
                            $hadir = explode("-", $d->$tgl);
                        }
                    
                        $tanggalStr = $tahun . '-' . str_pad($bulan, 2, '0', STR_PAD_LEFT) . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);
                        $tanggal = Carbon::parse($tanggalStr);
                        $hari = $tanggal->translatedFormat('l'); // atau 'l' saja untuk bahasa Inggris
                    
                        $isLibur = false;
                        $conn = new mysqli("localhost", "root", "", "presensigps");
                    
                        if (!$conn->connect_error) {
                            $sql = "SELECT COUNT(*) as total FROM libur_sekolah WHERE tanggal = '" . $tanggal->format('Y-m-d') . "'";
                            $result = $conn->query($sql);
                            if ($result && $row = $result->fetch_assoc()) {
                                $isLibur = $row['total'] > 0;
                            }
                        }
                    
                        // Menghitung Jumlah Izin dan Sakit
                        $isIzin = false;
                        $isSakit = false;
                        if (!$conn->connect_error) {
                            $nisn = $d->nisn;
                            $tglCari = $tanggal->format('Y-m-d');
                        
                            $sqlIzinSakit = "SELECT status FROM pengajuan_izin 
                                             WHERE nisn = '$nisn' 
                                             AND status_approved = 1 
                                             AND tgl_izin = '$tglCari'";
                        
                            $result = $conn->query($sqlIzinSakit);
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                                    if ($row['status'] === 'i') {
                                        $isIzin = true;
                                        $rekapBulan[$bulan]['izin']++;
                                    } elseif ($row['status'] === 's') {
                                        $isSakit = true;
                                        $rekapBulan[$bulan]['sakit']++;
                                    }
                                }
                            }
                        }
                    
                        $isBolos = false;
                        if (!$conn->connect_error) {
                            $sqlPresensi = "SELECT jam_in, jam_out FROM presensi 
                                WHERE nisn = '$nisn' 
                                AND tgl_presensi = '$tglCari'";
                            $result = $conn->query($sqlPresensi);
                            if ($result && $row = $result->fetch_assoc()) {
                                $jam_in = $row['jam_in'];
                                $jam_out = $row['jam_out'];
                                if (!empty($jam_in) && (empty($jam_out) || $jam_out > $jamPulangBatas)) {
                                    $isBolos = true;
                                    $rekapBulan[$bulan]['alfa']++;
                                }
                            }
                        }
                    
                        if (empty($d->$tgl)) {
                            $hadir = ['', ''];
                        } else {
                            $hadir = explode("-", $d->$tgl);
                        }
                    
                        // Hitung hadir, alfa
                        $isHadir = false;
                        if (!$conn->connect_error) {
                            $sqlPresensi = "SELECT jam_in FROM presensi 
                                            WHERE nisn = '$nisn' 
                                            AND tgl_presensi = '$tglCari'";
                            $result = $conn->query($sqlPresensi);
                            if ($result && $row = $result->fetch_assoc()) {
                                if (!empty($row['jam_in'])) {
                                    $isHadir = true;
                                }
                            }
                        }

                        if ($isHadir && !$isIzin && !$isSakit && !$isBolos) {
                            $rekapBulan[$bulan]['hadir']++;
                        } elseif ($isHadir && !$isIzin && !$isSakit && $isBolos) {
                            $rekapBulan[$bulan]['bolos']++;
                        } elseif (($hari != 'Sunday' && $hari != 'Minggu') && !$isLibur && !$isIzin && !$isSakit && !$isHadir) {
                            $rekapBulan[$bulan]['alfa']++;
                        }                        
                    
                        $conn->close();
                    }
                }
            ?>
            
            <?php
            foreach ($rekapBulan as $bulan => $rekap) {
                $totalSakitGanjil += $rekap['sakit'];
                $totalIzinGanjil += $rekap['izin'];
                $totalAlfaGanjil += $rekap['alfa'];
                $totalBolosGanjil += $rekap['bolos'];
            }
            ?>
            
            <td rowspan="7">GANJIL</td>
            <?php
                $namaBulanGanjil = [
                    7 => 'JULI',
                    8 => 'AGUSTUS',
                    9 => 'SEPTEMBER',
                    10 => 'OKTOBER',
                    11 => 'NOVEMBER',
                    12 => 'DESEMBER',
                ];

                foreach ($namaBulanGanjil as $bulanAngka => $namaBulan) {
                    echo "<tr>
                            <td>{$namaBulan}</td>
                            <td style='text-align: center;'>{$rekapBulan[$bulanAngka]['sakit']}</td>
                            <td style='text-align: center;'>{$rekapBulan[$bulanAngka]['izin']}</td>
                            <td style='text-align: center;'>{$rekapBulan[$bulanAngka]['alfa']}</td>
                            <td style='text-align: center;'>{$rekapBulan[$bulanAngka]['bolos']}</td>
                          </tr>";
                }
            ?>

        @endforeach

            <tr>
                <td colspan="2">JUMLAH</td>
                <td style='text-align: center;'><?= $totalSakitGanjil ?></td>
                <td style='text-align: center;'><?= $totalIzinGanjil ?></td>
                <td style='text-align: center;'><?= $totalAlfaGanjil ?></td>
                <td style='text-align: center;'><?= $totalBolosGanjil ?></td>
            </tr>


        @foreach ($rekapgenap as $d)  
            <?php
                $semester = 'genap';
                $bulanSemesterGenap = [];

                if ($semester == 'genap') {
                    $bulanSemesterGenap = [1, 2, 3, 4, 5, 6];
                }
            
                // Inisialisasi array untuk total tiap bulan
                $rekapBulan = [];
                foreach ($bulanSemesterGenap as $bulan) {
                    $rekapBulan[$bulan] = [
                        'hadir' => 0,
                        'sakit' => 0,
                        'izin' => 0,
                        'alfa' => 0,
                        'bolos' => 0,
                    ];
                }
            
                // Ambil data dari presensi dan izin/sakit
                foreach ($bulanSemesterGenap as $bulan) {
                    $daysInMonth = Carbon::createFromDate(null, $bulan, 1)->daysInMonth;
                
                    for ($i = 1; $i <= $daysInMonth; $i++) {
                        $tgl = "tgl_" . $i;
                        if (empty($d->$tgl)) {
                            $hadir = ['', ''];
                        } else {
                            $hadir = explode("-", $d->$tgl);
                        }
                    
                        $tanggalStr = $tahun . '-' . str_pad($bulan, 2, '0', STR_PAD_LEFT) . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);
                        $tanggal = Carbon::parse($tanggalStr);
                        $hari = $tanggal->translatedFormat('l'); // atau 'l' saja untuk bahasa Inggris
                    
                        $isLibur = false;
                        $conn = new mysqli("localhost", "root", "", "presensigps");
                    
                        if (!$conn->connect_error) {
                            $sql = "SELECT COUNT(*) as total FROM libur_sekolah WHERE tanggal = '" . $tanggal->format('Y-m-d') . "'";
                            $result = $conn->query($sql);
                            if ($result && $row = $result->fetch_assoc()) {
                                $isLibur = $row['total'] > 0;
                            }
                        }
                    
                        // Menghitung Jumlah Izin dan Sakit
                        $isIzin = false;
                        $isSakit = false;
                        if (!$conn->connect_error) {
                            $nisn = $d->nisn;
                            $tglCari = $tanggal->format('Y-m-d');
                        
                            $sqlIzinSakit = "SELECT status FROM pengajuan_izin 
                                             WHERE nisn = '$nisn' 
                                             AND status_approved = 1 
                                             AND tgl_izin = '$tglCari'";
                        
                            $result = $conn->query($sqlIzinSakit);
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                                    if ($row['status'] === 'i') {
                                        $isIzin = true;
                                        $rekapBulan[$bulan]['izin']++;
                                    } elseif ($row['status'] === 's') {
                                        $isSakit = true;
                                        $rekapBulan[$bulan]['sakit']++;
                                    }
                                }
                            }
                        }
                    
                        $isBolos = false;
                        if (!$conn->connect_error) {
                            $sqlPresensi = "SELECT jam_in, jam_out FROM presensi 
                                WHERE nisn = '$nisn' 
                                AND tgl_presensi = '$tglCari'";
                            $result = $conn->query($sqlPresensi);
                            if ($result && $row = $result->fetch_assoc()) {
                                $jam_in = $row['jam_in'];
                                $jam_out = $row['jam_out'];
                                if (!empty($jam_in) && (empty($jam_out) || $jam_out > $jamPulangBatas)) {
                                    $isBolos = true;
                                    $rekapBulan[$bulan]['alfa']++;
                                }
                            }
                        }
                    
                        if (empty($d->$tgl)) {
                            $hadir = ['', ''];
                        } else {
                            $hadir = explode("-", $d->$tgl);
                        }
                    
                        // Hitung hadir, alfa
                        $isHadir = false;
                        if (!$conn->connect_error) {
                            $sqlPresensi = "SELECT jam_in FROM presensi 
                                            WHERE nisn = '$nisn' 
                                            AND tgl_presensi = '$tglCari'";
                            $result = $conn->query($sqlPresensi);
                            if ($result && $row = $result->fetch_assoc()) {
                                if (!empty($row['jam_in'])) {
                                    $isHadir = true;
                                }
                            }
                        }

                        if ($isHadir && !$isIzin && !$isSakit && !$isBolos) {
                            $rekapBulan[$bulan]['hadir']++;
                        } elseif ($isHadir && !$isIzin && !$isSakit && $isBolos) {
                            $rekapBulan[$bulan]['bolos']++;
                        } elseif (($hari != 'Sunday' && $hari != 'Minggu') && !$isLibur && !$isIzin && !$isSakit && !$isHadir && empty($d->$tgl)) {
                            $rekapBulan[$bulan]['alfa']++;
                        }                        
                    
                        $conn->close();
                    }
                }
            ?>
            
            <?php
            foreach ($rekapBulan as $bulan => $rekap) {
                $totalSakitGenap += $rekap['sakit'];
                $totalIzinGenap += $rekap['izin'];
                $totalAlfaGenap += $rekap['alfa'];
                $totalBolosGenap += $rekap['bolos'];
            }
            ?>
            
            <td rowspan="7">GENAP</td>
            <?php
                $namaBulanGenap = [
                    1 => 'JANUARI',
                    2 => 'FEBRUARI',
                    3 => 'MARET',
                    4 => 'APRIL',
                    5 => 'MEI',
                    6 => 'JUNI',
                ];

                foreach ($namaBulanGenap as $bulanAngka => $namaBulan) {
                    echo "<tr>
                            <td>{$namaBulan}</td>
                            <td style='text-align: center;'>{$rekapBulan[$bulanAngka]['sakit']}</td>
                            <td style='text-align: center;'>{$rekapBulan[$bulanAngka]['izin']}</td>
                            <td style='text-align: center;'>{$rekapBulan[$bulanAngka]['alfa']}</td>
                            <td style='text-align: center;'>{$rekapBulan[$bulanAngka]['bolos']}</td>
                          </tr>";
                }
            ?>

        @endforeach

            <tr>
                <td colspan="2">JUMLAH</td>
                <td style='text-align: center;'><?= $totalSakitGenap ?></td>
                <td style='text-align: center;'><?= $totalIzinGenap ?></td>
                <td style='text-align: center;'><?= $totalAlfaGenap ?></td>
                <td style='text-align: center;'><?= $totalBolosGenap ?></td>
            </tr>
    </table>
    
    <table width="100%" style="margin-top: 50px; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
        <tr>
            <td style="width: 30%; text-align: justify; vertical-align: top; padding: 0px 0px 0px 100px; font-family: 'Times New Roman', Times, serif; font-size: 12px;">
                Kepala Sekolah <br>
                SMK Negeri 2 Kalianda,<br><br><br><br><br><br><br>
                <u><b>NYOMAN MISTER, M.Pd</b></u><br>
                Pembina<br>
                NIP. 19680814 200012 1 002
            </td>
            <td style="width: 30%; text-align: justify; vertical-align: top; padding: 0px 0px 0px 100px; font-family: 'Times New Roman', Times, serif; font-size: 12px;">
                Kalianda, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                Petugas Absensi,
            </td>
        </tr>
    </table>
  </section>

</body>

</html>