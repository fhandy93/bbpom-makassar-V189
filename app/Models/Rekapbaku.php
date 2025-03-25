<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapbaku extends Model
{
    use HasFactory;
    protected $table = 'rekap_baku';
    use Loggable;
    protected $fillable = [
        'nama',
        'no_kontrol',
        'bobot',
        'awal',
        'pecah',
        'masuk',
        'akhir',
        'bulan',
        'tahun',
        'lab'
    ];
}
