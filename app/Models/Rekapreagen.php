<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapreagen extends Model
{
    use HasFactory;
    protected $table = 'rekap_reagensia';
    use Loggable;
    protected $fillable = [
        'nama',
        'kataloq',
        'netto',
        'stok',
        'bulan',
        'tahun'
    ];
}
