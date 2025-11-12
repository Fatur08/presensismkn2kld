<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GambarController extends Controller
{
    public function show($filename)
    {
        $path = storage_path("app/public/uploads/murid/" . $filename);

        // Cek apakah file ada
        if (!file_exists($path)) {
            return response()->json(['error' => 'File tidak ditemukan'], Response::HTTP_NOT_FOUND);
        }

        // Set header CORS secara manual (Opsional, jika CORS belum dikonfigurasi)
        return response()->file($path, [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
        ]);
    }
}
