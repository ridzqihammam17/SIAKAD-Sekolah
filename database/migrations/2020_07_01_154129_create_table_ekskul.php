<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEkskul extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekskul', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_ekskul', 20);
            $table->timestamps();
        });

        Schema::table('siswa', function (Blueprint $table) {
            $table->foreign('id_ekskul')->references('id')->on('ekskul')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropForeign('siswa_id_ekskul_foreign');
        });
        Schema::dropIfExists('ekskul');
    }
}
