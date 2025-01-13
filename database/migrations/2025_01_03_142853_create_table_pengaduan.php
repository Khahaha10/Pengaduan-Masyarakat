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
        Schema::create('tabel_pengaduan', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->foreignId('id_masyarakat');
            $table->string('judul');
            $table->text('isi_pengaduan');
            $table->enum('status', ['pending', 'diverifikasi', 'ditolak']);
            $table->boolean('is_publik')->default(false);
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
        Schema::dropIfExists('tabel_pengaduan');
    }
};
