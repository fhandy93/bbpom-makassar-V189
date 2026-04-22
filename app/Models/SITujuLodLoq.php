<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SITujuLodLoq extends Model
{
    use HasFactory;
    protected $table = 'sipatuju_lod_loq';
    use Loggable;
    protected $fillable = [
        'uji_id',
        'kategori',
        'lod',
        'loq'
    ];
    public function uji()
    {
        return $this->belongsTo(SITujuZatuji::class,'uji_id');
    }
}
