<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
\Carbon\Carbon::setLocale('id');

class DashboardController extends Controller
{
    public function index()
    {
        $hariini = date("Y-m-d");
        $bulanini = date("m") * 1; // 1 atau Januari
        $tahunini = date("Y");
        // Ambil jam_masuk dari tabel jamsekolah
        $jamMasuk = DB::table('jamsekolah')->where('id', 1)->value('jam_masuk');

        // Jika tidak ada data jam_masuk, gunakan default "07:00"
        $jamMasuk = $jamMasuk ?? '07:00';

        $jamPulangAsli = DB::table('jamsekolah')->where('id', 1)->value('jam_pulang') ?? '16:00';

        // Tambahkan 5 menit toleransi
        $jamPulangBatas = Carbon::parse($jamPulangAsli)->addMinutes(5)->format('H:i:s');

        $nisn = str_pad((string) Auth::guard('murid')->user()->nisn, 10, '0',STR_PAD_LEFT);

        $murid = DB::table('murid')
            ->join('jurusan', 'murid.kode_jurusan', '=', 'jurusan.kode_jurusan')
            ->select('murid.*', 'jurusan.nama_jurusan')
            ->where('murid.nisn', $nisn)
            ->first();
        

        $presensihariini = DB::table('presensi')
            ->where('nisn', $nisn)
            ->where('tgl_presensi',$hariini)
            ->first();

        $historibulanini = DB::table('presensi')
            ->where('nisn',$nisn)
            ->whereRaw('MONTH(tgl_presensi)="'.$bulanini.'"')
            ->whereRaw('YEAR(tgl_presensi)="'. $tahunini . '"')
            ->orderBy('tgl_presensi')
            ->get();

        // Ambil rekap presensi berdasarkan jam_masuk dari database
        $rekappresensi = DB::table('presensi')
            ->selectRaw('COUNT(nisn) as jmlhadir, SUM(IF(jam_in > ?, 1, 0)) as jmlterlambat', [$jamMasuk])
            ->where('nisn', $nisn)
            ->whereMonth('tgl_presensi', $bulanini)
            ->whereYear('tgl_presensi', $tahunini)
            ->first();

        $leaderboard = DB::table('presensi')
            ->join('murid', 'presensi.nisn', '=', 'murid.nisn')
            ->join('jurusan', 'murid.kode_jurusan', '=', 'jurusan.kode_jurusan')
            ->where('tgl_presensi', $hariini)
            ->orderBy('jam_in')
            ->select(
                'presensi.*',
                'murid.nama_lengkap',
                'murid.kelas',
                'murid.kode_jurusan',
                'jurusan.nama_jurusan'
            )
            ->get();
        
        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        
        $rekapizin = DB::table('pengajuan_izin')
            ->selectRaw('SUM(IF(status="i",1,0)) as jmlizin, SUM(IF(status="s",1,0)) as jmlsakit')
            ->where('nisn',$nisn)
            ->whereRaw('MONTH(tgl_izin)="'.$bulanini.'"')
            ->whereRaw('YEAR(tgl_izin)="'. $tahunini . '"')
            ->where('status_approved', 1)
            ->first();
        return view('dashboard.dashboard', compact('presensihariini','historibulanini','namabulan','bulanini','tahunini','rekappresensi','leaderboard','rekapizin', 'murid', 'jamMasuk', 'jamPulangBatas', 'jamPulangAsli'));
    }

    public function dashboardadmin()
    {
        $hariini = date("Y-m-d");
        // Ambil jam_masuk dari tabel jamsekolah
        $jamMasuk = DB::table('jamsekolah')->where('id', 1)->value('jam_masuk');

        // Jika tidak ada data jam_masuk, gunakan default "07:00"
        $jamMasuk = $jamMasuk ?? '07:00';

        $jamPulangAsli = DB::table('jamsekolah')->where('id', 1)->value('jam_pulang') ?? '16:00';

        // Tambahkan 5 menit toleransi
        $jamPulangBatas = Carbon::parse($jamPulangAsli)->addMinutes(5)->format('H:i:s');
        $rekappresensi = DB::table('presensi')
            ->selectRaw("
                SUM(IF(jam_in IS NOT NULL AND jam_out IS NOT NULL AND jam_out >= '$jamPulangAsli', 1, 0)) as jmlhadir,
                SUM(IF(jam_in >= '$jamMasuk', 1, 0)) as jmlterlambat,
                SUM(IF(jam_in IS NOT NULL AND (jam_out IS NULL OR jam_out > '$jamPulangBatas'), 1, 0)) as jmlbolos
            ")
            ->where('tgl_presensi', $hariini)
            ->first();

        $rekapizin = DB::table('pengajuan_izin')
            ->selectRaw('SUM(IF(status="i",1,0)) as jmlizin, SUM(IF(status="s",1,0)) as jmlsakit')
            ->where('tgl_izin',$hariini)
            ->where('status_approved', 1)
            ->first();

        return view('dashboard.dashboardadmin', compact('rekappresensi','rekapizin'));
    }
}
