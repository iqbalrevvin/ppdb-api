<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->integer('prodi_id');
            $table->string('nik', 16);
            $table->string('nisn', 10);
            $table->string('nama_lengkap');
            $table->string('no_hp', 15);
            $table->string('email');
            $table->string('jenis_kelamin', 10);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama', 10);
            $table->string('ibu_kandung');
            $table->string('dusun');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
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
        Schema::dropIfExists('pendaftaran');
    }
}
