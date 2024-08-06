<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    protected $fillable = ['kode_tps', 'no_tps', 'alamat_tps', 'kelurahan', 'kecamatan', 'kota', 'provinsi'];
    

    public function perolehanSuara()
    {
        return $this->hasMany(PerolehanSuara::class, 'kode_tps', 'kode_tps');
    }
}
