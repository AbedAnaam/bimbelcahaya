<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelMapel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_mapel', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('kelas_id');
            $table->foreign('kelas_id')->references('id')->on('tabel_kelas')->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->string('nama_mapel');
            $table->mediumText('deskripsi_mapel')->nullable();
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
        Schema::dropIfExists('tabel_mapel');
    }
}
