<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inputaspirasis', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('foto')->nullable();       
            $table->integer('id_kategori');
            $table->string('lokasi');
            $table->string('keterangan');
            $table->text('feedback')->nullable();
            $table->enum('status',['Menunggu','Proses','Selesai'])->default('Menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inputaspirasis');
    }
};
