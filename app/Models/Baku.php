<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baku extends Model
{
    use HasFactory;
    protected $table = 'baku';
    use Loggable;
    protected $fillable = [
        'nama',
        'no_kontrol',
        'bobot',
        'stok'
    ];
    public function bak()
    {
        return $this->hasMany(Transbaku::class);
    }
}
