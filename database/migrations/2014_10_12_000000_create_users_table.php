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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('rombel')->nullable();
            $table->string('rayon')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('no_phone_orang_tua')->nullable();
            $table->string('nominal_perjanjian')->nullable();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
