<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('smp', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('npsn', 20);
            $table->text('alamat');
            $table->string('desa_kelurahan', 100);
            $table->string('kecamatan', 100);
            $table->string('kabupaten_kota', 100);
            $table->string('kode_pos', 10);
            $table->string('status_sekolah', 20);
            $table->string('waktu_penyelenggaraan', 50);
            $table->string('telepon')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('website', 255)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->binary('gambar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smp');
    }
};
