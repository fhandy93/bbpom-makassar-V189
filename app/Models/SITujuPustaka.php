<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SITujuPustaka extends Model
{
    use HasFactory;
    protected $table = 'sipatuju_pustaka';
    use Loggable;
    protected $fillable = [
        'uji_id',
        'pustaka',
        'pelarut',
        'jns_kolom',
        'ukuran',
        'panjang_diameter',
        'panjang_gel',
        'detector',
        'fase_gerak',
        'laju_air',
        'pengencer',
        'berat_atom',
        'berat_molekul'

    ];
    public function uji()
    {
        return $this->belongsTo(SITujuZatuji::class,'uji_id');
    }
}
