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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tgl_pengaduan')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama')->nullable();
            $table->text('isi_laporan')->nullable();
            $table->string('foto')->nullable();
            $table->enum('status', ['0', 'proses', 'selesai'])->default(0)->nullable();
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
        Schema::dropIfExists('pengaduan');
    }
};
