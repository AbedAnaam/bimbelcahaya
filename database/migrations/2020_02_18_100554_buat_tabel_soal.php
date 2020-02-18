<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelSoal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_soal', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('mapel_id');
            $table->foreign('mapel_id')->references('id')->on('tabel_mapel')->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->string('gambar_soal')->comments('Hanya menampilkan path imagenya saja');
            $table->string('nama_soal');
            $table->string('isi_soal');
            $table->mediumText('deskripsi_soal')->nullable();
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
        Schema::dropIfExists('tabel_soal');
    }
}
