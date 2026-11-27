<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    protected $table = 'persyaratan';
    protected $fillable = ['nama', 'wajib'];

    public function layanan() { return $this->belongsTo(JenisLayanan::class, 'jenis_layanan_id'); }
}