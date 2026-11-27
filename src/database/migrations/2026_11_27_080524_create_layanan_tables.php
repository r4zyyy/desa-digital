<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_layanan', function (Blueprint $t) {
            $t->id();
            $t->string('nama')->unique();
            $t->text('deskripsi')->nullable();
            $t->boolean('aktif')->default(true);
            $t->timestamps();
        });

        Schema::create('persyaratan', function (Blueprint $t) {
            $t->id();
            $t->foreignId('jenis_layanan_id')->constrained('jenis_layanan')->restrictOnDelete();
            $t->string('nama');
            $t->boolean('wajib')->default(true);
            $t->timestamps();
        });

        Schema::create('permohonan', function (Blueprint $t) {
            $t->id();
            $t->string('nomor')->unique();
            $t->foreignId('user_id')->constrained()->restrictOnDelete();
            $t->foreignId('jenis_layanan_id')->constrained('jenis_layanan')->restrictOnDelete();
            $t->text('keperluan');
            $t->string('status')->default('draft')->index();
            $t->timestamps();
        });

        Schema::create('berkas', function (Blueprint $t) {
            $t->id();
            $t->foreignId('permohonan_id')->constrained('permohonan')->cascadeOnDelete();
            $t->foreignId('persyaratan_id')->constrained('persyaratan')->restrictOnDelete();
            $t->string('path');
            $t->string('nama_asli');
            $t->string('status')->default('menunggu');
            $t->text('catatan')->nullable();
            $t->timestamps();
            $t->unique(['permohonan_id', 'persyaratan_id']);
        });

        Schema::create('riwayat_status', function (Blueprint $t) {
            $t->id();
            $t->foreignId('permohonan_id')->constrained('permohonan')->cascadeOnDelete();
            $t->foreignId('user_id')->constrained();
            $t->string('status');
            $t->text('catatan')->nullable();
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_status');
        Schema::dropIfExists('berkas');
        Schema::dropIfExists('permohonan');
        Schema::dropIfExists('persyaratan');
        Schema::dropIfExists('jenis_layanan');
    }
};