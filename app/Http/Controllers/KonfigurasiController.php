<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class KonfigurasiController extends Controller
{
    public function lokasisekolah()
    {
        $lok_kantor = DB::table('konfigurasi_lokasi')->where('id',1)->first();
        return view('konfigurasi.lokasisekolah',compact('lok_kantor'));
    }

    public function updatelokasikantor (Request $request)
    {
        $lokasi_sekolah = $request->lokasi_sekolah;
        $radius = $request->radius;

        // Cek apakah data dengan id = 1 sudah ada
        $cek = DB::table('konfigurasi_lokasi')->where('id', 1)->first();
    
        if ($cek) {
            // Jika data sudah ada, update
            $update = DB::table('konfigurasi_lokasi')
                ->where('id', 1)
                ->update([
                    'lokasi_sekolah' => $lokasi_sekolah,
                    'radius' => $radius
                ]);
            
            if ($update) {
                return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
            } else {
                return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
            }
        } else {
            // Jika data belum ada, insert
            $insert = DB::table('konfigurasi_lokasi')->insert([
                'id' => 1, // pastikan jika kamu ingin set id 1 secara manual
                'lokasi_sekolah' => $lokasi_sekolah,
                'radius' => $radius
            ]);
        
            if ($insert) {
                return Redirect::back()->with(['success' => 'Data Berhasil Ditambahkan']);
            } else {
                return Redirect::back()->with(['warning' => 'Data Gagal Ditambahkan']);
            }
        }
    }

    public function jamsekolah()
    {
        $jamsekolah = DB::table('jamsekolah')->where('id',1)->first();
        return view('konfigurasi.jamsekolah',compact('jamsekolah'));
    }

    public function updatejamsekolah(Request $request)
    {
        $jam_masuk = $request->jam_masuk;
        $jam_pulang = $request->jam_pulang;
    
        // Cek apakah data dengan id = 1 sudah ada
        $cek = DB::table('jamsekolah')->where('id', 1)->first();
    
        if ($cek) {
            // Jika data sudah ada, update
            $update = DB::table('jamsekolah')
                ->where('id', 1)
                ->update([
                    'jam_masuk' => $jam_masuk,
                    'jam_pulang' => $jam_pulang
                ]);
            
            if ($update) {
                return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
            } else {
                return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
            }
        } else {
            // Jika data belum ada, insert
            $insert = DB::table('jamsekolah')->insert([
                'id' => 1, // pastikan jika kamu ingin set id 1 secara manual
                'jam_masuk' => $jam_masuk,
                'jam_pulang' => $jam_pulang
            ]);
        
            if ($insert) {
                return Redirect::back()->with(['success' => 'Data Berhasil Ditambahkan']);
            } else {
                return Redirect::back()->with(['warning' => 'Data Gagal Ditambahkan']);
            }
        }
    }
}
