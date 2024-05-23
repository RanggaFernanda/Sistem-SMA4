<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DaftarEkskul extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftarekskuls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_siswa')->nullable();
            $table->string('nisn_siswa')->nullable();
            $table->string('kelas_siswa')->nullable();
            $table->string('email_siswa')->nullable();
            $table->string('jeniskelamin_siswa')->nullable();
            $table->string('id_ekskul')->nullable();


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
        Schema::dropIfExists('daftarekskuls');
    }
}
