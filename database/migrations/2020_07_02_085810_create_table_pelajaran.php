<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePelajaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelajaran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pelajaran', 30);
            $table->timestamps();
        });

        Schema::table('guru', function (Blueprint $table) {
            $table->foreign('id_pelajaran')->references('id')->on('pelajaran')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guru', function (Blueprint $table) {
            $table->dropForeign('guru_id_pelajaran_foreign');
        });
        Schema::dropIfExists('pelajaran');
    }
}
