<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $table = 'permohonan';
    protected $fillable = ['jenis_layanan_id', 'keperluan'];

    public function user() { return $this->belongsTo(User::class); }
    public function layanan() { return $this->belongsTo(JenisLayanan::class, 'jenis_layanan_id'); }
    public function berkas() { return $this->hasMany(Berkas::class, 'permohonan_id'); }
    public function riwayat() { return $this->hasMany(RiwayatStatus::class, 'permohonan_id'); }
}