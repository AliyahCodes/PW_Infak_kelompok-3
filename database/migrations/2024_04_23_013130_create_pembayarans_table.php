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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string("nama_bank")->nullable();
            $table->string("pemilik_bank")->nullable();
            $table->string("nominal")->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('tanggal_pembayaran')->nullable();
            $table->string('status')->nullable();
            $table->string('bulan')->nullable();
            // $table->date('done_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
