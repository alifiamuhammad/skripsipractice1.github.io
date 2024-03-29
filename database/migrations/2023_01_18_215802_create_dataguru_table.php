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
        Schema::create('data_gurus', function (Blueprint $table) {
            $table->id();
            $table->string('NIP');
            $table->string('Nama');
            $table->string('Alamat');
            $table->string('Email');
            $table->string('NoHP');
            $table->foreignId('id_Mapel');
            $table->string('Password');
            $table->string('Foto');
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
        Schema::dropIfExists('dataguru');
    }
};
