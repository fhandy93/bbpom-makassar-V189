<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operasional extends Model
{
    use HasFactory;
    protected $table = 'operasional';
    use Loggable;
    protected $fillable = [
        'nama',
        'netto',
        'stok'
    ];
    public function opera()
    {
        return $this->hasMany(Transoperasional::class);
    }
}
