<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table = 'berkas';
    protected $fillable = ['persyaratan_id', 'path', 'nama_asli', 'status', 'catatan'];

    public function permohonan() { return $this->belongsTo(Permohonan::class, 'permohonan_id'); }
    public function persyaratan() { return $this->belongsTo(Persyaratan::class, 'persyaratan_id'); }
}
