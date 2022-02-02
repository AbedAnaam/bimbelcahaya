<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_kelas', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('jenjang_id');
            $table->foreign('jenjang_id')->references('id')->on('tabel_jenjang')->onUpdate('CASCADE')->onDelete('CASCADE');

            // $table->string('kategori_kelas');
			$table->string('nama_kelas');
			$table->mediumText('deskripsi_kelas')->nullable();
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
        Schema::dropIfExists('tabel_kelas');
    }
}
