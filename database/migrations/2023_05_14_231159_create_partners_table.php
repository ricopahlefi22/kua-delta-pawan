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
        // Schema::create('partners', function (Blueprint $table) {
        Schema::create('pasangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreignId('wedding_id')->nullable();
            $table->foreign('wedding_id')->references('id')->on('pernikahan');
            $table->string('photo')->nullable();
            $table->string('ktp')->nullable();
            $table->string('name');
            $table->string('id_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('status')->nullable();
            $table->string('parent_status')->nullable();
            $table->string('employment')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
