<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_pelayanans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('wl')->nullable();
            $table->text('singer')->nullable();
            $table->text('pemusik')->nullable();
            $table->string('ohp')->nullable();
            $table->string('doa')->nullable();
            $table->string('warta')->nullable();
            $table->string('kolektan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelayanans');
    }
};