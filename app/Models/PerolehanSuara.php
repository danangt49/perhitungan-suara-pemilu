<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerolehanSuara extends Model
{
    protected $table = 'perolehan_suaras'; 
    protected $fillable = ['kode_tps', 'id_user', 'jumlah_suara', 'catatan'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function tps()
    {
        return $this->belongsTo(Tps::class, 'kode_tps', 'kode_tps');
    }
}
