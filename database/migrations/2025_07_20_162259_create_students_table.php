<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id_siswa');
            $table->integer('id_kelas')->unsigned()->nullable();
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('set null');
            $table->string('nama_siswa');
            $table->string('nis')->unique();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};