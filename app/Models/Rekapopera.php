<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapopera extends Model
{
    use HasFactory;
    protected $table = 'rekap_operasional';
    use Loggable;
    protected $fillable = [
        'nama',
        'netto',
        'stok',
        'bulan',
        'tahun'
    ];
}
