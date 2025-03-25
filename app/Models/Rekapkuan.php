<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapkuan extends Model
{
    use HasFactory;
    protected $table = 'rekap_kuantitatif';
    use Loggable;
    protected $fillable = [
        'nama',
        'bmn',
        'merek',
        'ukuran',
        'awal',
        'pecah',
        'masuk',
        'akhir',
        'bulan',
        'tahun',
        'lab'
    ];
}
