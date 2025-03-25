<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulirlvla extends Model
{
    use HasFactory;
    protected $table = 'sudoku_formulir_lvl_a';
    use Loggable;
    protected $fillable = [
        'induk_kode',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
