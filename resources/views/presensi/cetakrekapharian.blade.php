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
  <title>Rekap Presensi Harian</title>

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
            background-color: #f8f8f8; /* Biar kelihatan tengah di web */
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
                        REKAPITULASI ABSEN SISWA HARIAN<br>
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
            <?php
                // Ganti supaya jumlah hari sesuai bulan & tahun yang dikirim
                $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
            ?>

            <tr>
                <th colspan="3">BULAN {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }}</th>
                <th colspan="2" rowspan="2">Jam</th>
                <th rowspan="2" style="vertical-align: top;">K<br>e<br>t.</th>
            </tr>

            <tr>
                <th style="width: 30px; text-align: center;">No</th>
                <th style="width: 120px; text-align: center;">NISN</th>
                <th style="width: 180px;">Nama Murid</th>
                <th style="text-align: center;">
                    Masuk
                </th>
                <th style="text-align: center;">
                    Pulang
                </th>
            </tr>

            @php
                $no = 1;
                $total_laki_laki = 0;
                $total_perempuan = 0;
                $rekap = $rekap->sortBy('nama_lengkap');
            @endphp

            <!--@foreach ($rekap as $d)
            <tr>
                <td style='text-align: center; width: 30px;'>{{ $no++ }}</td>    
                <td style="width: 120px;">{{ $d->nisn }}</td>
                <td style="width: 180px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    @if($d->jenis_kelamin === 'Perempuan')
                        <b><i>{{ $d->nama_lengkap }}</i></b>
                    @else
                        {{ $d->nama_lengkap }}
                    @endif
                </td>
                <?php
                $totalhadir = 0;
                $totalterlambat = 0;
                $totalalfa = 0;
                $totalizin = 0;
                $totalsakit = 0;
                $totalbolos = 0;
                // Hitung total laki-laki dan perempuan di dalam foreach
                if ($d->jenis_kelamin == 'Laki-laki') {
                    $total_laki_laki++;
                } else {
                    $total_perempuan++;
                }

                // Gunakan bulan dan tahun dari input form, bukan bulan sekarang
                $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

                for ($i = 1; $i <= $jumlahHari; $i++) {
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
                
                    if (!$conn->connect_error) {
                        $sql = "SELECT COUNT(*) as total FROM libur_sekolah WHERE tanggal = '" . $tanggal->format('Y-m-d') . "'";
                        $result = $conn->query($sql);
                        if ($result && $row = $result->fetch_assoc()) {
                            $isLibur = $row['total'] > 0;
                        }
                    }
                
                    // Ambil izin dan sakit dari database untuk tanggal ini
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
                                    $totalizin++;
                                } elseif ($row['status'] === 's') {
                                    $isSakit = true;
                                    $totalsakit++;
                                }
                            }
                        }
                    }

                    // Cek bolos
                    $isBolos = false;
                    $sqlPresensi = "SELECT jam_in, jam_out FROM presensi 
                        WHERE nisn = '$nisn' 
                        AND tgl_presensi = '$tglCari'";
                    $result = $conn->query($sqlPresensi);
                    if ($result && $row = $result->fetch_assoc()) {
                        $jam_in = $row['jam_in'];
                        $jam_out = $row['jam_out'];
                        if (!empty($jam_in) && (empty($jam_out) || $jam_out > $jamPulangBatas)) {
                            $isBolos = true;
                            $totalbolos++;
                            $totalalfa++;
                        }
                    }

                    // Cek Terlambat
                    $isTerlambat = false;
                    if (!empty($d->$tgl) && !$isIzin && !$isSakit && !$isBolos) {
                        $totalhadir += 1;
                        $jam_masuk = $hadir[0];
                        if ($jam_masuk > $jamMasuk) {
                            $isTerlambat = true;
                            $totalterlambat++;
                        }
                    } elseif (($hari != 'Sunday' && $hari != 'Minggu') && !$isLibur && !$isIzin && !$isSakit && !$isTerlambat && empty($d->$tgl)) {
                        $totalalfa++;
                    }
                ?>
                <td style="text-align: center;">
                    <?php if ($hari == 'Sunday' || $hari == 'Minggu'): ?>
                        <div style="width: 10px; height: 10px; background-color: white; margin: auto;" title="Minggu"></div>
                    <?php elseif($isLibur): ?>
                        <div style="width: 10px; height: 10px; background-color: gray; margin: auto;" title="Libur"></div>
                    <?php elseif($isIzin && $isSakit): ?>
                        <div style="width: 10px; height: 10px; background-color: yellow; margin: auto;" title="Izin"></div>
                        <div style="width: 10px; height: 10px; background-color: blue; margin: auto;" title="Sakit"></div>
                    <?php elseif($isIzin): ?>
                        <div style="width: 10px; height: 10px; background-color: yellow; margin: auto;" title="Izin"></div>
                    <?php elseif($isSakit): ?>
                        <div style="width: 10px; height: 10px; background-color: blue; margin: auto;" title="Sakit"></div>
                    <?php elseif($isBolos): ?>
                        <div style="width: 10px; height: 10px; background-color: purple; margin: auto;" title="Bolos"></div>
                    <?php elseif(!empty($d->$tgl)): ?>
                        <?php
                        $jam_masuk = $hadir[0];
                        $jam_pulang = $hadir[1];
                        ?>
                        <?php if($jam_masuk <= $jamMasuk && $jam_pulang >= $jamPulangAsli && $jam_pulang <= $jamPulangBatas): ?>
                            <div style="width: 10px; height: 10px; background-color: green; margin: auto;"></div>
                        <?php elseif($jam_masuk > $jamMasuk && $jam_pulang >= $jamPulangAsli && $jam_pulang <= $jamPulangBatas): ?>
                            <div style="width: 10px; height: 10px; background-color: saddlebrown; margin: auto;"></div>
                        <?php else: ?>
                            <div style="width: 10px; height: 10px; background-color: red; margin: auto;"></div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div style="width: 10px; height: 10px; background-color: red; margin: auto;"></div>
                    <?php endif; ?>
                </td>
                <?php } ?>
                <td style='text-align: center;'>{{ $totalhadir }}</td>
                <td style='text-align: center;'>{{ $totalterlambat }}</td>
                <td style='text-align: center;'>{{ $totalalfa }}</td>
                <td style='text-align: center;'>{{ $totalizin }}</td>
                <td style='text-align: center;'>{{ $totalsakit }}</td>
                <td style='text-align: center;'>{{ $totalbolos }}</td>
                <td style='text-align: center;'>
                    @if ($totalalfa >= 24)
                        P3
                    @elseif ($totalalfa >= 16)
                        P2
                    @elseif ($totalalfa >= 8)
                        P1
                    @else

                    @endif
                </td>
            </tr>
            @endforeach-->
        </table>

        <table width="100%" style="margin-top: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
            <tr>
                <td style="width: 40%; vertical-align: top;">
                    <b>Keterangan :</b><br><br>
                    <table style="font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
                        <tr>
                            <td><div style="width: 12px; height: 12px; background-color: green; display: inline-block;"></div></td>
                            <td style="padding-right: 5px;">Hadir</td>
                            <td><div style="width: 12px; height: 12px; background-color: brown; display: inline-block;"></div></td>
                            <td style="padding-right: 5px;">Terlambat</td>
                            <td><div style="width: 12px; height: 12px; background-color: red; display: inline-block;"></div></td>
                            <td style="padding-right: 5px;">Alfa</td>
                            <td><div style="width: 12px; height: 12px; background-color: yellow; display: inline-block;"></div></td>
                            <td style="padding-right: 5px;">Izin</td>
                            <td><div style="width: 12px; height: 12px; background-color: blue; display: inline-block;"></div></td>
                            <td style="padding-right: 5px;">Sakit</td>
                            <td><div style="width: 12px; height: 12px; background-color: purple; display: inline-block;"></div></td>
                            <td style="padding-right: 5px;">Bolos</td>
                        </tr>
                    </table>

                    <br><br>
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