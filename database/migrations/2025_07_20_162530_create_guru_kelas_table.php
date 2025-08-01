<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guru_kelas', function (Blueprint $table) {
            $table->integer('guru_id')->unsigned();
            $table->foreign('guru_id')->references('id_guru')->on('guru')->onDelete('cascade');

            $table->integer('kelas_id')->unsigned();
            $table->foreign('kelas_id')->references('id_kelas')->on('kelas')->onDelete('cascade');

            $table->primary(['guru_id', 'kelas_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guru_kelas');
    }
};