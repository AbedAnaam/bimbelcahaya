<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelJenjang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_jenjang', function(Blueprint $table){
			$table->increments('id');
			$table->string('gambar_jenjang');
			$table->string('nama_jenjang');
			$table->mediumText('deskripsi_content')->nullable();
			$table->rememberToken();
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
        Schema::dropIfExists('tabel_jenjang');
    }
}
