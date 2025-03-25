<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suku extends Model
{
    use HasFactory;
    protected $table = 'suku';
    use Loggable;
    protected $fillable = [
        'nama',
        'no_apl',
        'stok'
    ];
    public function suk()
    {
        return $this->hasMany(Transsuku::class);
    }
}
