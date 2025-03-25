<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapsuku extends Model
{
    use HasFactory;
    protected $table = 'rekap_suku';
    use Loggable;
    protected $fillable = [
        'nama',
        'kataloq',
        'no_apl',
        'stok',
        'bulan',
        'tahun'
    ];
}
