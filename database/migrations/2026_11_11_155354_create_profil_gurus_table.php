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
        Schema::create('profil_gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->integer('nip');
            $table->string('bidang_studi');
            $table->integer('no_telepon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_gurus');
    }
};
