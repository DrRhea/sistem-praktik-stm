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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->enum('kelas', ['X', 'XI', 'XII'])->default('X');
            $table->enum('jurusan', ['Teknik Komputer dan Jaringan', 'Teknik Otomotif', 'Teknik Elektro', 'Teknik Mesin', 'Multimedia', 'Rekayasa Perangkat Lunak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};