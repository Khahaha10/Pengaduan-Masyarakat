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
        Schema::create('tabel_komentar', function (Blueprint $table) {
            $table->id('id_komentar');
            $table->foreignId('id_masyarakat')->onDelete('cascade');
            $table->foreignId('id_forum')->onDelete('cascade');
            $table->text('isi_komentar');
            $table->foreignId('parent_id')->nullable()->onDelete('cascade');
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
        Schema::dropIfExists('tabel_komentar');
    }
};
