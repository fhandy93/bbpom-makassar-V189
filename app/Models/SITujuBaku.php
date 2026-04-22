<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SITujuBaku extends Model
{
    use HasFactory;
    protected $table = 'sipatuju_baku';
    use Loggable;
    protected $fillable = [
        'uji_id',
        'no_kontrol',
        'baku',
        'kadar',
        'susut',
        'koreksi',
    ];
    public function uji()
    {
        return $this->belongsTo(SITujuZatuji::class,'uji_id');
    }
}
