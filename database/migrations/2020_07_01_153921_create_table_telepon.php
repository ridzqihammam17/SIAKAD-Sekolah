<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTelepon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telepon', function (Blueprint $table) {
            $table->bigInteger('id_siswa')->unsigned()->primary('id_siswa');
            $table->string('nomor_telepon', 15)->unique();
            $table->timestamps();
        });

        Schema::table('telepon', function (Blueprint $table) {
            $table->foreign('id_siswa')
                ->references('id')->on('siswa')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telepon');
    }
}
