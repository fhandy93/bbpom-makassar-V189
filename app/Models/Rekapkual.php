<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapkual extends Model
{
    use HasFactory;
    protected $table = 'rekap_kualitatif';
    use Loggable;
    protected $fillable = [
        'nama',
        'bmn',
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
