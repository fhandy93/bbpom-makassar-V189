<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapmikro extends Model
{
    use HasFactory;
    protected $table = 'rekap_mikrobiologi';
    use Loggable;
    protected $fillable = [
        'nama',
        'kataloq',
        'netto',
        'exp',
        'stok',
        'bulan',
        'tahun'
    ];
}
