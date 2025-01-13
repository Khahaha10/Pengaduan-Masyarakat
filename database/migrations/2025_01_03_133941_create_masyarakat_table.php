<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_masyarakat', function (Blueprint $table) {
            $table->id('id_masyarakat');
            $table->string('nik')->unique();
            $table->string('nama_masyarakat');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telp');
            $table->string('foto_profil')->nullable();
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
        Schema::dropIfExists('tabel_masyarakat');
    }
};
