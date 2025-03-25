<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makrolvla extends Model
{
    use HasFactory;
    protected $table = 'sudoku_makro_lvl_a';
    use Loggable;
    protected $fillable = [
        'kode_proses',
        'nm_proses',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
