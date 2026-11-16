<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Menghubungkan Laravel (subdomain1) dengan halaman face recognition (subdomain2)
 * lewat token sekali pakai, sehingga identitas murid ditentukan SERVER,
 * bukan parameter URL yang bisa diedit.
 */
class FaceTokenController extends Controller
{
    private const TTL_MINUTES = 5;

    // Batas jarak wajah yang diterima server (client memakai 0.45)
    private const MAX_DISTANCE = 0.5;

    private const FACE_URL = 'https://subdomain2.nirwanahotelkalianda.com/';

    private static function key(?string $token): string
    {
        return 'face_token:' . $token;
    }

    private function load(?string $token): array
    {
        $data = $token ? Cache::get(self::key($token)) : null;
        abort_unless($data, 403, 'Token tidak valid atau kedaluwarsa');
        return $data;
    }

    // 1) Dipanggil dari halaman Laravel (murid SUDAH login, route pakai auth:murid)
    public function issue(Request $request)
    {
        $murid = Auth::guard('murid')->user();
        abort_unless($murid, 401);

        $masuk  = $request->boolean('absen_masuk');
        $pulang = $request->boolean('absen_pulang');

        // Aturan sama persis dengan yang dulu ada di React (goAbsen)
        $absen = ($masuk && $pulang) ? null : ($masuk ? 'pulang' : 'masuk');

        $token = Str::random(64);
        Cache::put(self::key($token), [
            'murid_id'     => $murid->getAuthIdentifier(),
            'nisn'         => str_pad((string) $murid->nisn, 10, '0', STR_PAD_LEFT),
            'nama'         => $murid->nama_lengkap,
            'foto'         => $murid->foto,
            'lokasi'       => $request->input('lokasi'),
            'absen_masuk'  => $masuk,
            'absen_pulang' => $pulang,
            'absen'        => $absen,
            'verified'     => false,
        ], now()->addMinutes(self::TTL_MINUTES));

        return response()->json(['url' => self::FACE_URL . '?token=' . $token]);
    }

    // 2) Dipanggil React: info singkat murid pemilik token
    public function session(Request $request)
    {
        $data = $this->load($request->query('token'));
        return response()->json(Arr::only($data, ['nama', 'absen_masuk', 'absen_pulang']));
    }

    // 3) Dipanggil React: foto referensi HANYA milik murid pemilik token
    public function reference(Request $request)
    {
        $data = $this->load($request->query('token'));

        // Sesuaikan folder dengan tempat foto murid disimpan (storage/app/public/uploads/murid)
        $path = 'uploads/murid/' . basename((string) $data['foto']);
        abort_unless(Storage::disk('public')->exists($path), 404);

        return response()->file(Storage::disk('public')->path($path));
    }

    // 4) Dipanggil React setelah wajah cocok + kedip
    public function verify(Request $request)
    {
        $token = $request->input('token');
        $data  = $this->load($token);

        $distance = (float) $request->input('distance');
        abort_if($distance <= 0 || $distance >= self::MAX_DISTANCE, 422, 'Wajah tidak cocok');

        $data['verified'] = true;
        $data['distance'] = $distance;
        Cache::put(self::key($token), $data, now()->addMinutes(self::TTL_MINUTES));

        return response()->json(['ok' => true]);
    }

    // 5) Dipakai di PresensiController@store: token harus sudah verified,
    //    milik murid yang sedang login, dan hanya bisa dipakai sekali.
    public static function consume(?string $token): array
    {
        $data = $token ? Cache::get(self::key($token)) : null;

        abort_unless(
            $data
            && $data['verified']
            && $data['absen']
            && (string) $data['murid_id'] === (string) Auth::guard('murid')->id(),
            403,
            'Verifikasi wajah belum dilakukan'
        );

        Cache::forget(self::key($token));
        return $data;
    }
}
