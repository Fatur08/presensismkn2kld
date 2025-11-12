<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nisn')->index(); // NISN sebagai identitas siswa
            $table->date('tgl_presensi'); // Tanggal presensi
            $table->time('jam_in')->nullable(); // Jam masuk
            $table->time('jam_out')->nullable(); // Jam pulang
            $table->string('lokasi_in')->nullable(); // Lokasi absen masuk
            $table->string('lokasi_out')->nullable(); // Lokasi absen pulang
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presensi');
    }
};
