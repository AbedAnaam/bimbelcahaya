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
            $table->string('jenjang_id');
            $table->string('gambar_kelas');
            $table->string('kategori_kelas');
			$table->string('nama_kelas');
			$table->mediumText('deskripsi_content')->nullable();
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
