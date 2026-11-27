<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatStatus extends Model
{
    protected $table = 'riwayat_status';
    protected $fillable = ['user_id', 'status', 'catatan'];

    public function user() { return $this->belongsTo(User::class); }
}