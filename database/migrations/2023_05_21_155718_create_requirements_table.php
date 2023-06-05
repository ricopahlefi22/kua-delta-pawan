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
        // Schema::create('requirements', function (Blueprint $table) {
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreignId('wedding_id')->nullable();
            $table->foreign('wedding_id')->references('id')->on('pernikahan');
            $table->string('n1')->nullable();
            $table->string('n2')->nullable();
            $table->string('n3')->nullable();
            $table->string('n4')->nullable();
            $table->string('n5')->nullable();
            $table->string('n7')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('surat_despensasi')->nullable();
            $table->string('u_kk')->nullable();
            $table->string('u_surat_kesehatan')->nullable();
            $table->string('u_akta_lahir')->nullable();
            $table->string('u_surat_izin_komandan')->nullable();
            $table->string('u_akta_cerai_kematian')->nullable();
            $table->string('u_surat_izin_kedutaan')->nullable();
            $table->string('u_paspor')->nullable();
            $table->string('p_kk')->nullable();
            $table->string('p_surat_kesehatan')->nullable();
            $table->string('p_akta_lahir')->nullable();
            $table->string('p_surat_izin_komandan')->nullable();
            $table->string('p_akta_cerai_kematian')->nullable();
            $table->string('p_surat_izin_kedutaan')->nullable();
            $table->string('p_paspor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements');
    }
};
