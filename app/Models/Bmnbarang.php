<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bmnbarang extends Model
{
    use HasFactory;
    protected $table = 'bmn_barang';
    use Loggable;
    protected $fillable = [
        'kode',
        'kd_satker',
        'nm_barang',
        'nup',
        'kondisi',
        'umur',
        'merek',
        'tgl_perolehan',
        'lokasi',
        'nilai',
        'barcode'
    ];
    public function ruang()
    {
        return $this->belongsTo(Bmnruangan::class,'lokasi', 'id');
    }
}
