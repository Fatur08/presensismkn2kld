<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use App\Models\Jurusan;
use App\Models\RiwayatPelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PoinController extends Controller
{
    public function index(Request $request)
    {
        $query = Murid::query();
        $query->select('murid.*','nama_jurusan');
        $query->join('jurusan','murid.kode_jurusan','=','jurusan.kode_jurusan');
        $query->orderBy('nama_lengkap');
        if(!empty($request->nama_lengkap)){
            $query->where('nama_lengkap','like','%'.$request->nama_lengkap . '%');
        }
        if(!empty($request->kode_jurusan)){
            $query->where('murid.kode_jurusan', $request->kode_jurusan);
        }
        if(!empty($request->kelas)){
            $query->where('murid.kelas', $request->kelas);
        }
        $murid = $query->paginate(50);
        $jurusan = DB::table('jurusan')->get();

        return view('poin.poin', compact('murid', 'jurusan'));
    }

    
    public function poin(Request $request)
    {
        $query = Murid::query();
        $query->select('murid.*','nama_jurusan');
        $query->join('jurusan','murid.kode_jurusan','=','jurusan.kode_jurusan');
        $query->orderBy('nama_lengkap');
        if(!empty($request->nama_lengkap)){
            $query->where('nama_lengkap','like','%'.$request->nama_lengkap . '%');
        }
        if(!empty($request->kode_jurusan)){
            $query->where('murid.kode_jurusan', $request->kode_jurusan);
        }
        if(!empty($request->kelas)){
            $query->where('murid.kelas', $request->kelas);
        }
        $murid = $query->paginate(50);
        $jurusan = DB::table('jurusan')->get();
        
        return view('poin.poin', compact('murid','jurusan'));
    }

    public function riwayatpelanggaran($nisn)
    {
        try {
            // Ambil data murid berdasarkan NISN
            $murid = DB::table('murid')->where('nisn', $nisn)->first();

            if (!$murid) {
                return Redirect::back()->with(['error' => 'Data murid tidak ditemukan.']);
            }

            // Ambil data pelanggaran murid (riwayat)
            $riwayatpelanggaran = DB::table('riwayat_pelanggaran')
                ->where('nisn', $murid->nisn)
                ->paginate(5);
            
            // Hitung jumlah jenis pelanggaran berbeda di kelompok A
            $pelanggaranKelompokA = DB::table('riwayat_pelanggaran')
                ->where('nisn', $nisn)
                ->where('kelompok', 'kelompok_a') // Pastikan nama kolom sesuai
                ->select('jenis_pelanggaran')
                ->distinct()
                ->get();

            $jumlahPelanggaranA = $pelanggaranKelompokA->count();
            $notifikasi_a = null;

            if ($jumlahPelanggaranA >= 1) {
                $notifikasi_a = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok A sebanyak {$jumlahPelanggaranA} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "Dikembalikan kepada orang tua dan dipersilahkan mengajukan pemohonan keluar sekolah";
            }
            

            // Hitung jumlah jenis pelanggaran berbeda di kelompok B
            $pelanggaranKelompokB = DB::table('riwayat_pelanggaran')
                ->where('nisn', $nisn)
                ->where('kelompok', 'kelompok_b') // Pastikan nama kolom sesuai
                ->select('jenis_pelanggaran')
                ->distinct()
                ->get();

            $jumlahPelanggaranB = $pelanggaranKelompokB->count();
            $notifikasi_b = null;

            if ($jumlahPelanggaranB == 1) {
                $notifikasi_b = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok B sebanyak {$jumlahPelanggaranB} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "a. Melakukan pelanggaran 1 kali peringatan";
            } elseif ($jumlahPelanggaranB == 2) {
                $notifikasi_b = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok B sebanyak {$jumlahPelanggaranB} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "b. Melakukan pelanggaran 2 kali peringatan dan membuat surat pernyataan <br>"
                . "diketahui orang tua, wali kelas, guru BK dan kepala Kompetensi keahlian";
            } elseif ($jumlahPelanggaranB == 3) {
                $notifikasi_b = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok B sebanyak {$jumlahPelanggaranB} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "c. Melakukan pelanggaran 3 kali orang tua dipanggil ke sekolah";
            } elseif ($jumlahPelanggaranB == 4) {
                $notifikasi_b = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok B sebanyak {$jumlahPelanggaranB} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "d. Melakukan pelanggaran 4 kali dikembalikan kepada orang tua <br>"
                . "selama 1 hari dan masuk kembali bersama orang tua";
            } elseif ($jumlahPelanggaranB == 5) {
                $notifikasi_b = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok B sebanyak {$jumlahPelanggaranB} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "e. Melakukan pelanggaran 5 kali dikembalikan ke orang tua <br>"
                . "selama 1 minggu dan masuk kembali bersama orang tua";
            } elseif ($jumlahPelanggaranB == 6) {
                $notifikasi_b = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok B sebanyak {$jumlahPelanggaranB} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "f. Melakukan pelanggaran 6 kali dan dipersilahkan mengajukan permohonan keluar dari sekolah";
            } elseif ($jumlahPelanggaranB > 6) {
                $notifikasi_b = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok B sebanyak {$jumlahPelanggaranB} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "f. Melakukan pelanggaran {$jumlahPelanggaranB} kali dan dipersilahkan mengajukan permohonan keluar dari sekolah";
            }


            // Hitung jumlah jenis pelanggaran berbeda di kelompok C
            $pelanggaranKelompokC = DB::table('riwayat_pelanggaran')
                ->where('nisn', $nisn)
                ->where('kelompok', 'kelompok_c') // Pastikan nama kolom sesuai
                ->select('jenis_pelanggaran')
                ->distinct()
                ->get();

            $jumlahPelanggaranC = $pelanggaranKelompokC->count();
            $notifikasi_c = null;

            if ($jumlahPelanggaranC >= 1 && $jumlahPelanggaranC <=2) {
                $notifikasi_c = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok C sebanyak {$jumlahPelanggaranC} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "a. Melakukan pelanggaran C1 tidak diijinkan mengikuti pelajaran sampai pergantian jam pelajaran,<br>"
                . "dilibatkan dalam kebersihan lingkungan sekolah/perpustakaan.";
            } elseif ($jumlahPelanggaranC == 3) {
                $notifikasi_c = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok C sebanyak {$jumlahPelanggaranC} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "b. Melakukan pelanggaran 3 kali, diperingatkan harus membuat surat peringatan yang harus diketahui wali kelas";
            } elseif ($jumlahPelanggaranC == 4) {
                $notifikasi_c = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok C sebanyak {$jumlahPelanggaranC} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "c. Melakukan pelanggaran 4 kali diperingatkan harus membuat Surat Peringatan <br>"
                . "yang harus diketahui wali kelas, orang tua, guru BK dan kepala Kompetensi Keahlian";
            } elseif ($jumlahPelanggaranC == 5) {
                $notifikasi_c = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok C sebanyak {$jumlahPelanggaranC} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "d. Melakukan pelanggaran 5 kali, orang tua diundang ke sekolah";
            } elseif ($jumlahPelanggaranC >= 6 && $jumlahPelanggaranC <=8) {
                $notifikasi_c = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok C sebanyak {$jumlahPelanggaranC} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "e. Melakukan pelanggaran 6 kali, diserahkan kepada orang tua <br>"
                . "selama 1 hari dan masuk kembali bersama orang tua";
            } elseif ($jumlahPelanggaranC == 9) {
                $notifikasi_c = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok C sebanyak {$jumlahPelanggaranC} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "f. Melakukan pelanggaran 9 kali dikembalikan kepada orang tua dan dipersilahkan <br>"
                . "mengajukan permohonan pindah sekolah";
            } elseif ($jumlahPelanggaranC > 9) {
                $notifikasi_c = "Murid dengan NISN {$nisn} telah melakukan pelanggaran Kelompok C sebanyak {$jumlahPelanggaranC} kali."
                . "<br><strong>Sanksi:</strong><br>"
                . "f. Melakukan pelanggaran {$jumlahPelanggaranC} kali dikembalikan kepada orang tua dan dipersilahkan <br>"
                . "mengajukan permohonan pindah sekolah";
            }

            // Kirim semua data ke view
            return view('poin.riwayatpelanggaran', compact('riwayatpelanggaran', 'murid', 'notifikasi_a', 'notifikasi_b', 'notifikasi_c'));

        } catch (\Exception $e) {
            //dd($e);
            return Redirect::back()->with(['error' => 'Terjadi kesalahan saat mengambil data.']);
        }
    }

    public function store(Request $request)
    {
        $nisn = $request->nisn;
        $kelompok = $request->kelompok;
        $jenis_pelanggaran = $request->jenis_pelanggaran;

        try {
            $data = [
                'nisn'=>$nisn,
                'kelompok'=>$kelompok,
                'jenis_pelanggaran'=>$jenis_pelanggaran
            ];
            $simpan = DB::table('riwayat_pelanggaran')->insert($data);
            if ($simpan){
                return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            //dd($e);
            return Redirect::back()->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    public function editpoin(Request $request, $nisn, $id_riwayat)
    {
        $murid = DB::table('murid')->where('nisn', $nisn)->first();

        $riwayat_pelanggaran = DB::table('riwayat_pelanggaran')
            ->where('id_riwayat', $id_riwayat)
            ->where('nisn', $nisn)
            ->first();

        // Ambil semua jenis_pelanggaran unik berdasarkan kelompok pelanggaran yang sedang diedit
        $jenis_pelanggaran_list = DB::table('riwayat_pelanggaran')
            ->where('kelompok', $riwayat_pelanggaran->kelompok)
            ->distinct()
            ->pluck('jenis_pelanggaran');

        return view('poin.editpoin', compact('riwayat_pelanggaran', 'murid', 'jenis_pelanggaran_list'));
    }


    public function updatepoin(Request $request, $nisn, $id_riwayat)
    {
        $kelompok = $request->kelompokedit;
        $jenis_pelanggaran = $request->jenis_pelanggaranedit;

        try {
            $data = [
                'kelompok' => $request->kelompokedit,
                'jenis_pelanggaran' => $request->jenis_pelanggaranedit
            ];
            $update = DB::table('riwayat_pelanggaran')->where('id_riwayat', $id_riwayat)->where('nisn', $nisn)->update($data);
            if ($update){
                return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
            }
        } catch (\Exception $e) {
            dd($e);
            //return Redirect::back()->with(['error' => 'Data Gagal Diupdate']);
        }
    }

    public function delete($id_riwayat)
    {
        $delete = DB::table('riwayat_pelanggaran')->where('id_riwayat', $id_riwayat)->delete();
        if($delete){
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }

    public function informasi_poin()
    {
        return view('poin.informasi_poin');
    }
}
