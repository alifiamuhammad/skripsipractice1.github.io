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
        Schema::create('datasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('NIS');
            $table->string('Nama');
            $table->string('Alamat');
            $table->foreignId('Kelas_id');
            $table->string('Email');
            $table->foreignId('Jurusan_id');
            $table->string('Foto')->nullable();
            $table->string('NoHP');
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
        Schema::dropIfExists('datasiswa');
    }
};
