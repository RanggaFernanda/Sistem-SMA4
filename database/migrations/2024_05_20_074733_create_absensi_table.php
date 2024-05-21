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
            $table->unsignedBigInteger('nama_siswa');
            $table->unsignedBigInteger('ekskul');
            $table->date('tanggal');
            $table->boolean('kehadiran'); // true untuk hadir, false untuk tidak hadir
            $table->timestamps();

            $table->foreign('nama_siswa')->references('id')->on('datasiswas');
            $table->foreign('ekskul')->references('id')->on('dataekskuls');
        });
    }

    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}
