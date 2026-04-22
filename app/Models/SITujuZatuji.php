<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SITujuZatuji extends Model
{
    use HasFactory;
    protected $table = 'sipatuju_zat_uji';
    use Loggable;
    protected $fillable = [
        'nm_zat',
        'ket',
    ];
    public function pustaka()
{
    return $this->hasMany(SITujuPustaka::class, 'uji_id');
}
}
