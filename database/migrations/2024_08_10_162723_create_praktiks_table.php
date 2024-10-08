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
        Schema::create('praktiks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajar_id')->constrained('pengajars');
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->string('judul');
            $table->longText('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('praktiks');
    }
};
