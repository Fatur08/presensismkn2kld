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
        Schema::create('riwayat_pelanggaran', function (Blueprint $table) {
            $table->id('id_riwayat'); // Primary key
            $table->string('nisn')->index(); // NISN sebagai identitas siswa
            $table->string('kelompok');
            $table->char('jenis_pelanggaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_pelanggaran');
    }
};
