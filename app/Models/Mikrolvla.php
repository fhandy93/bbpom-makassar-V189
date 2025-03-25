<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mikrolvla extends Model
{
    use HasFactory;
    protected $table = 'sudoku_mikro_lvl_a';
    use Loggable;
    protected $fillable = [
        'kode_makro',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
