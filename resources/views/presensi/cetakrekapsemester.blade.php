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
  <title>Rekap Presensi Semester</title>

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
        }

        .page {
            width: 19.8cm;
            min-height: 33cm;
            background-color: white;
            padding: 0;
            margin: 0;
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
            font-size: 8px;
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
            font-size: 8px;
            word-break: break-word;
        }

        .tabelpresensi tr td {
            border: 1px solid #131212;
            padding: 1px;
            font-size: 10px;
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
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">
    <div class="page">
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
                        REKAPITULASI ABSEN SISWA SEMESTER {{ strtoupper($semester) }}<br>
                        TAHUN PELAJARAN {{ $tahun }}<br>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 8%; font-size: 14px; font-weight: bold;">Jurusan</td>
                <td style="width: 2%; font-size: 14px; font-weight: bold; text-align: center;">:</td>
                <td style="width: 40%; font-size: 14px; font-weight: bold;">{{ $nama_jurusan ?? '...' }}</td>
            </tr>
            <tr>
                <td style="font-size: 14px; font-weight: bold;">Kelas</td>
                <td style="font-size: 14px; font-weight: bold; text-align: center;">:</td>
                <td style="font-size: 14px; font-weight: bold;">{{ $kelas ?? '...' }}</td>
            </tr>
        </table>
        
        <table class="tabelpresensi">
            <tr>
                <th colspan="3">TAHUN {{ $tahun }}</th>
                <th colspan="24">BULAN</th>
                <th rowspan="3" style="vertical-align: top; background-color: green; color: white;">
                    H<br>A<br>D<br>I<br>R
                </th>
                <th rowspan="3" style="vertical-align: top; background-color: red; color: white;">
                    A<br>L<br>F<br>A
                </th>
                <th rowspan="3" style="vertical-align: top; background-color: yellow; color: black;">
                    I<br>Z<br>I<br>N
                </th>
                <th rowspan="3" style="vertical-align: top; background-color: blue; color: white;">
                    S<br>A<br>K<br>I<br>T
                </th>
                <th rowspan="3" style="vertical-align: top;">K<br>e<br>t.</th>
            </tr>

            <?php
            $bulanSemester = [];
            if (strtolower($semester) == 'genap') {
                $bulanSemester = [
                    1 => 'Januari',
                    2 => 'Februari',
                    3 => 'Maret',
                    4 => 'April',
                    5 => 'Mei',
                    6 => 'Juni'
                ];
            } else {
                $bulanSemester = [
                    7 => 'Juli',
                    8 => 'Agustus',
                    9 => 'September',
                    10 => 'Oktober',
                    11 => 'November',
                    12 => 'Desember'
                ];
            }

            // Kolom sub-absen per bulan
            $kategori = [
                ['label' => 'HADIR', 'bg' => 'green', 'text_color' => 'white'],
                ['label' => 'ALFA', 'bg' => 'red', 'text_color' => 'white'],
                ['label' => 'IZIN', 'bg' => 'yellow', 'text_color' => 'black'],
                ['label' => 'SAKIT', 'bg' => 'blue', 'text_color' => 'white'],
            ];
            ?>
            <tr>
                <th rowspan="2" style="width: 30px; text-align: center;">No.</th>
                <th rowspan="2" style="width: 60px; text-align: center;">NISN</th>
                <th rowspan="2" style="width: 170px;">Nama Murid</th>
                <?php foreach ($bulanSemester as $bulan): ?>
                    <th colspan="<?= count($kategori) ?>"><?= $bulan ?></th>
                <?php endforeach; ?>
            </tr>
            <tr>
                <?php foreach ($bulanSemester as $bulan): ?>
                    <?php foreach ($kategori as $kat): ?>
                        <th style="vertical-align: top; background-color: <?= $kat['bg'] ?>; color: <?= $kat['text_color'] ?>;">
                            <?php
                            // Membuat tulisan vertikal per huruf
                            $huruf = str_split($kat['label']);
                            echo implode('<br>', $huruf);
                            ?>
                        </th>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tr>

            @php
                $no = 1;
                $total_laki_laki = 0;
                $total_perempuan = 0;
                $rekap = $rekap->sortBy('nama_lengkap');
            @endphp

            @foreach ($rekap as $d)
            <tr>
                <td style='text-align: center; width: 30px;'>{{ $no++ }}</td>    
                <td style="width: 60px;">{{ $d->nisn }}</td>
                <td style="width: 170px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    @if($d->jenis_kelamin === 'Perempuan')
                        <b><i>{{ $d->nama_lengkap }}</i></b>
                    @else
                        {{ $d->nama_lengkap }}
                    @endif
                </td>

                <?php
                    $bulanSemester = [];

                    if ($semester == 'genap') {
                        $bulanSemester = [1, 2, 3, 4, 5, 6];
                    } else {
                        $bulanSemester = [7, 8, 9, 10, 11, 12];
                    }
                
                    // Inisialisasi array untuk total tiap bulan
                    $rekapBulan = [];
                    foreach ($bulanSemester as $bulan) {
                        $rekapBulan[$bulan] = [
                            'hadir' => 0,
                            'alfa' => 0,
                            'izin' => 0,
                            'sakit' => 0,
                        ];
                    }
                
                    // Hitung total laki-laki dan perempuan
                    if ($d->jenis_kelamin == 'Laki-laki') {
                        $total_laki_laki++;
                    } else {
                        $total_perempuan++;
                    }
                
                    // Ambil data dari presensi dan izin/sakit
                    foreach ($bulanSemester as $bulan) {
                        $daysInMonth = Carbon::createFromDate(null, $bulan, 1)->daysInMonth;
                    
                        for ($i = 1; $i <= $daysInMonth; $i++) {
                            $tanggalStr = $tahun . '-' . str_pad($bulan, 2, '0', STR_PAD_LEFT) . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);
                            $tanggal = Carbon::parse($tanggalStr);
                            $hari = $tanggal->translatedFormat('l'); // atau 'l' saja untuk bahasa Inggris
                            $tglField = "tgl_" . $i;
                        
                            $isLibur = false;
                        
                            if (!$conn->connect_error) {
                                $sql = "SELECT COUNT(*) as total FROM libur_sekolah WHERE tanggal = '" . $tanggal->format('Y-m-d') . "'";
                                $result = $conn->query($sql);
                                if ($result && $row = $result->fetch_assoc()) {
                                    $isLibur = $row['total'] > 0;
                                }
                            }
                        
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
                        
                            if (empty($d->$tglField)) {
                                $hadir = ['', ''];
                            } else {
                                $hadir = explode("-", $d->$tglField);
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
                            } elseif (($hari != 'Sunday' && $hari != 'Minggu') && !$isLibur && !$isIzin && !$isSakit && !$isHadir) {
                                $rekapBulan[$bulan]['alfa']++;
                            }
                        }
                    }
                ?>

                @foreach ($bulanSemester as $bulan)
                    <td style='text-align: center;'>{{ $rekapBulan[$bulan]['hadir'] }}</td>
                    <td style='text-align: center;'>{{ $rekapBulan[$bulan]['alfa'] }}</td>
                    <td style='text-align: center;'>{{ $rekapBulan[$bulan]['izin'] }}</td>
                    <td style='text-align: center;'>{{ $rekapBulan[$bulan]['sakit'] }}</td>
                @endforeach
                
                <?php
                $totalHadir = 0;
                $totalAlfa = 0;
                $totalIzin = 0;
                $totalSakit = 0;
                
                foreach ($rekapBulan as $bulan => $rekap) {
                    $totalHadir += $rekap['hadir'];
                    $totalAlfa += $rekap['alfa'];
                    $totalIzin += $rekap['izin'];
                    $totalSakit += $rekap['sakit'];
                }
                ?>

                <td style='text-align: center;'><?= $totalHadir ?></td>
                <td style='text-align: center;'><?= $totalAlfa ?></td>
                <td style='text-align: center;'><?= $totalIzin ?></td>
                <td style='text-align: center;'><?= $totalSakit ?></td>
                <td style='text-align: center;'>
                    @if ($totalAlfa >= 24)
                        P3
                    @elseif ($totalAlfa >= 16)
                        P2
                    @elseif ($totalAlfa >= 8)
                        P1
                    @else

                    @endif
                </td>
            </tr>
            @endforeach

        </table>

        <table width="100%" style="margin-top: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
            <tr>
                <td style="width: 40%; vertical-align: top;">
                    <table style="width: 50%;">
                        <tr>
                            <td style="width: 30%; font-size: 11px;">Laki-laki</td>
                            <td style="width: 5%; text-align: center; font-size: 11px;">:</td>
                            <td style="font-size: 11px;">{{ $total_laki_laki }}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 11px;">Perempuan</td>
                            <td style="text-align: center; font-size: 11px;">:</td>
                            <td style="font-size: 11px;">{{ $total_perempuan }}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 11px;">Jumlah</td>
                            <td style="text-align: center; font-size: 11px;">:</td>
                            <td style="font-size: 11px;">{{ $total_laki_laki + $total_perempuan }}</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 30%; text-align: justify; vertical-align: top; padding: 0px 5px 5px 20px; font-family: 'Times New Roman', Times, serif; font-size: 12px;">
                    Kepala Sekolah <br>
                    SMK Negeri 2 Kalianda,<br><br><br><br><br><br><br>
                    <u><b>NYOMAN MISTER, M.Pd</b></u><br>
                    Pembina<br>
                    NIP. 19680814 200012 1 002
                </td>
                <td style="width: 30%; text-align: justify; vertical-align: top; padding: 0px 5px 5px 20px; font-family: 'Times New Roman', Times, serif; font-size: 12px;">
                    Kalianda, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                    Petugas Absensi,
                </td>
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
  </section>
</body>
</html>
<?php
$conn->close();
?>