<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisLayanan extends Model
{
    protected $table = 'jenis_layanan';
    protected $fillable = ['nama', 'deskripsi', 'aktif'];

    public function persyaratan() { return $this->hasMany(Persyaratan::class, 'jenis_layanan_id'); }
    public function permohonan() { return $this->hasMany(Permohonan::class, 'jenis_layanan_id'); }
}