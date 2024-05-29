<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_ekskul');
            $table->date('tanggal');
            $table->enum('kehadiran', ['hadir', 'alpa', 'izin', 'sakit'])->default('alpa');
            $table->integer('pertemuan')->nullable();
            $table->timestamps();
            $table->foreign('id_siswa')->references('id')->on('datasiswas');
            $table->foreign('id_ekskul')->references('id')->on('dataekskuls');
        });
    }

    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}
